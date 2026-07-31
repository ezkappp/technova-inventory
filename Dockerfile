FROM php:8.2-fpm

# Install dependency sistem + extension PHP yang dibutuhkan CodeIgniter
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev libicu-dev unzip git curl \
    && docker-php-ext-install mysqli intl mbstring gd

# Salin composer dari image resmi composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html/writable

EXPOSE 9000
CMD ["php-fpm"]