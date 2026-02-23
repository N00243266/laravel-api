FROM php:8.3-cli

# System dependencies + Postgres support
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev \
 && docker-php-ext-install pdo pdo_pgsql

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy application
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Render provides $PORT
EXPOSE 10000
CMD php -S 0.0.0.0:${PORT:-10000} -t public