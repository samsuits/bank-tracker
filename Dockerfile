FROM php:8.2-cli

WORKDIR /var/www

# Install system dependencies + Node.js
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip gnupg \
    && docker-php-ext-install pdo_mysql \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000