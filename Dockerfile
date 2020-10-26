FROM php:7.4-apache

# Set up xdebug
RUN pecl install xdebug-2.9.6\
    && docker-php-ext-enable xdebug

# change the web_root to /var/www/html/webroot folder
RUN sed -i -e "s/html/html\/webroot/g" /etc/apache2/sites-enabled/000-default.conf
