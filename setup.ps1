$ErrorActionPreference = "Stop"

docker-compose up -d --build

# espera o container php iniciar
$maxTries = 40
$try = 0
while ($try -lt $maxTries) {
  $status = docker inspect -f "{{.State.Running}}" biblioteca-php 2>$null
  if ($status -eq "true") { break }
  Start-Sleep -Seconds 2
  $try++
}
if ($status -ne "true") { throw "biblioteca-php não iniciou a tempo." }

# Se falhar, o script aborta
docker exec -it biblioteca-php composer install --no-interaction --prefer-dist
docker exec -it biblioteca-php cp /var/www/html/.env.example /var/www/html/.env
docker exec -it biblioteca-php php artisan key:generate
docker exec -it biblioteca-php php artisan migrate --force
docker exec -it biblioteca-php php artisan db:seed --class=BibliotecaSeeder --force
docker exec -it biblioteca-php php artisan storage:link
docker exec -it biblioteca-php npm install
docker exec -it biblioteca-php npm run build

Write-Host "Tudo pronto!"