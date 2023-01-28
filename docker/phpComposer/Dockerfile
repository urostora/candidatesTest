FROM composer as comp

FROM php:8.2-cli as composerinstaller

RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN docker-php-ext-enable mysqli
RUN apt-get install -y \
        libzip-dev \
        zip \
  && docker-php-ext-install zip

COPY --from=comp /usr/bin/composer /usr/bin/composer

WORKDIR /
RUN mkdir html
WORKDIR /html

ENV COMPOSER_ALLOW_SUPERUSER=1