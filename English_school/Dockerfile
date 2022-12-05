FROM php:8.1-fpm

WORKDIR /app

RUN apt-get update

RUN apt-get install -y zip unzip

RUN docker-php-ext-install pdo pdo_mysql sockets

RUN curl -sS https://getcomposer.org/installer​ | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .
