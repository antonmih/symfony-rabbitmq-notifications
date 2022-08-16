FROM php:8.0-fpm

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

RUN chown www-data:www-data /var/www

# only for dev environment
RUN usermod -u 1000 www-data