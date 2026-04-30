FROM php:8.2-apache

WORKDIR /var/www/html

RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY index.php .

COPY sa.css .

# Background Video
COPY 62129ed9-455f-4fa1-aa22-2cb25b6b496b.mp4 .
