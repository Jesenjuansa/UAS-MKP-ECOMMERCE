FROM php:8.2-fpm

# Install kebutuhan sistem
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring bcmath gd

# Set folder kerja
WORKDIR /var/www

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy semua file project
COPY . .

# Install library Laravel
RUN composer install --no-dev --optimize-autoloader

# Permission (biar ga error)
RUN chmod -R 775 storage bootstrap/cache

# Railway pakai port 8080
EXPOSE 8080

# Jalankan Laravel
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080

