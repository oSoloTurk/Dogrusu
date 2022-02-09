FROM php:7.4-fpm
RUN apt-get update -y \
    && apt-get install -y libssl-dev pkg-config \
    && apt-get upgrade \
    && pecl install mongodb && docker-php-ext-enable mongodb