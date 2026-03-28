#!/bin/bash

echo "Pulling latest code..."
git pull origin main

echo "Installing dependencies..."
composer install --no-dev --optimize-autoloader

echo "Running migrations..."
php artisan migrate --force

echo "Clearing cache..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear

echo "Done!"