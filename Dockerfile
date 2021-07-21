FROM php:7-apache
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-enable pdo_mysql
COPY ./ /var/www/html/
COPY config.ini.docker /var/www/html/config.ini
