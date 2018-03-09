FROM php:7.2-apache

MAINTAINER Hatim HABBOUS <hatim.habbous@orange.com>

RUN apt-get update \
 && docker-php-ext-install pdo_mysql \
 && a2enmod rewrite \
 && curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html