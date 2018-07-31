FROM php:fpm

WORKDIR /var/consumer

RUN apt-get update && apt-get install -y \
    htop \
    vim \
    && docker-php-ext-install mbstring bcmath

ENTRYPOINT ["php", "consumer.php"]