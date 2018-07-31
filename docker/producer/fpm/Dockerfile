FROM php:fpm

WORKDIR /var/producer

RUN apt-get update && apt-get install -y \
    htop \
    vim \
    && docker-php-ext-install mbstring bcmath
