FROM php:8.2-fpm

# Install system deps
RUN apt-get update && apt-get install -y \
    git unzip zip curl nodejs npm \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring bcmath gd

WORKDIR /var/www

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

# Install PHP deps
RUN composer install --no-dev --optimize-autoloader

# Install JS deps & build Vite 🔥
RUN npm install && npm run build

RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8080

CMD php artisan migrate --force || true && php artisan db:seed --force || true && php artisan storage:link || true && php artisan serve --host=0.0.0.0 --port=8080


