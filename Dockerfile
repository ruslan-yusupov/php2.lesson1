# The different stages of this Dockerfile are meant to be built into separate images
# https://docs.docker.com/develop/develop-images/multistage-build/
# https://docs.docker.com/compose/compose-file/#target



### NGINX stage
FROM nginx:latest as nginx



### MYSQL stage
FROM mysql as mysql

COPY ./docker/db/dump.sql /docker-entrypoint-initdb.d



### WORKSPACE stage
FROM php:8.0-fpm as php

RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && apt update \
    && apt upgrade -y \
    && apt install -y git \
    && apt install -y libzip-dev zlib1g-dev \
    && apt install -y unzip \
    && docker-php-ext-install zip
    ###TODO add webpack
    # && curl -sL https://deb.nodesource.com/setup_12.x | bash - \
    # && apt install -y nodejs \
    # && npm install --save-dev webpack

COPY /docker/php/php.ini /usr/local/etc/php/conf.d/
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN mkdir -p /home/www-data/php.local
RUN mkdir -p /home/www-data/.composer
RUN chmod 0775 /home/www-data/.composer

WORKDIR /home/www-data/php.local

ARG USER_UID
RUN deluser www-data \
    && addgroup --gid $USER_UID www-data \
    && adduser --uid $USER_UID --gid $USER_UID --home /home/www-data --disabled-password --gecos "First Last,RoomNumber,WorkPhone,HomePhone" www-data

COPY composer.* ./

RUN chown -R www-data:www-data ./

USER www-data

RUN composer clear-cache && composer install
