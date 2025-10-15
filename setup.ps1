docker-compose up -d --build
docker exec -it biblioteca-php composer install
docker exec -it biblioteca-php php artisan migrate
docker exec -it biblioteca-php php artisan db:seed --class=BibliotecaSeeder
docker exec -it biblioteca-php cp /var/www/.env.example /var/www/.env
docker exec -it biblioteca-php php artisan key:generate
docker exec -it biblioteca-php php artisan storage:link
docker exec -it biblioteca-php npm install
docker exec -it biblioteca-php npm run build
Write-Host "Tudo pronto!"