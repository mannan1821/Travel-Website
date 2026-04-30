FROM php:8.2-apache

WORKDIR /var/www/html

RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY index.php .

COPY sa.css .

COPY background-video.mp4 .
