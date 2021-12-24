FROM php:8.0-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

# Install Composer and make it available in the PATH
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

RUN apt-get update
RUN apt-get install -y \
	git \
	zip unzip

RUN a2enmod rewrite

## Project path
ENV PROJECT_PATH=/var/www/html
ENV PROJECT_PUBLIC_PATH=$PROJECT_PATH/public

## Move VirtualHost defualt values to container
COPY 000-default.conf /etc/apache2/sites-enabled/000-default.conf
