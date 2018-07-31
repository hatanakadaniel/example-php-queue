FROM php:fpm

WORKDIR /var/consumer

RUN apt-get update && apt-get install -y \
    htop \
    vim \
    && docker-php-ext-install mbstring bcmath

#ENTRYPOINT ["php", "artisan", "serve", "--host=0.0.0.0"]
ENTRYPOINT ["php", "artisan", "mq:work"]