ARG PHP_EXTENSIONS='intl'

FROM thecodingmachine/php:8.0.3-v4-apache

RUN a2enmod rewrite

ENV APACHE_RUN_USER=www-data \
    APACHE_RUN_GROUP=www-data \
    APACHE_DOCUMENT_ROOT=/var/www/html/ \
    ABSOLUTE_APACHE_DOCUMENT_ROOT=/var/www/html

# Update 
RUN sudo apt-get update