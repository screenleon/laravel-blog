FROM php:7.4-fpm
LABEL maintainer "Lien Chen"

RUN apt-get update && docker-php-ext-install pdo_mysql

# change gid, uid to match 1000:1000 use for php-fpm
RUN groupmod -g 1000 www-data && usermod -u 1000 www-data

WORKDIR /var/www

USER www-data