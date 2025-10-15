FROM php:8.3-apache

# Instalar dependências e extensões do Laravel
RUN apt-get update && apt-get install -y \
    git unzip zip libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev libzip-dev nano \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && a2enmod rewrite

# Instalar Composer globalmente
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Configurar o Apache para apontar para /var/www/html/public
RUN echo '<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
    ErrorLog ${APACHE_LOG_DIR}/error.log\n\
    CustomLog ${APACHE_LOG_DIR}/access.log combined\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# Definir diretório de trabalho
WORKDIR /var/www/html

# Ajustar permissões corretas para o Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 777 /var/www/html \
    && mkdir -p storage/framework/{cache,sessions,views} bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 777 storage bootstrap/cache

# Instalar Node.js + npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

RUN apt-get install -y npm

# Verificar
RUN node -v && npm -v

# Comando padrão
CMD ["apache2-foreground"]
