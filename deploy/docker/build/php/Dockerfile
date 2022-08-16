FROM php:8.0-fpm as php

USER root
RUN apt-get install -y tzdata \
    && cp /usr/share/zoneinfo/Europe/Moscow /etc/localtime \
    && apt-get clean

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libmcrypt-dev \
    libpng-dev \
    mariadb-client \
    libzip-dev \
    nano \
    librabbitmq-dev \
    libssh-dev \
    libpq-dev \
    libicu-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && docker-php-ext-install \
           pdo \
           pdo_pgsql \
           pgsql \
           bcmath \
           gd \
           zip \
           intl \
    && pecl install amqp  \
    && docker-php-ext-enable amqp

WORKDIR /var/www/symfony
COPY composer.json composer.lock ./

RUN ( \
        composer install --optimize-autoloader --no-scripts && \
        composer clear-cache \
  )

COPY . ./

RUN chown www-data:www-data /var/www/symfony
RUN rm .env* && touch .env && chown www-data:www-data .env
