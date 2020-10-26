FROM php:7.4-apache

# Set up xdebug
RUN pecl install xdebug-2.9.6\
    && docker-php-ext-enable xdebug
