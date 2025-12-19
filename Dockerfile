FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git unzip curl zip libzip-dev nodejs npm \
    && docker-php-ext-install zip pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-dev
RUN npm install && npm run build

EXPOSE 10000
CMD php artisan serve --host=0.0.0.0 --port=10000
