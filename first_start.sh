#!/usr/bin/env sh

cp ./backend-apis/.env.example ./backend-apis/.env

docker compose pull & docker compose build

docker compose up -d

echo "wait 1 minute..." & sleep 60

docker compose exec -t backend sh -c "composer install && php artisan migrate && php artisan db:seed"
