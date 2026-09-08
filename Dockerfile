FROM php:8.4-fpm

# Instala o driver PDO MySQL indispensável
RUN docker-php-ext-install pdo_mysql

WORKDIR /var/www/html