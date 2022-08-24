FROM php:7.4-apache

RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
RUN chown root:root -R /var/www/html && chmod go-w -R /var/www/html

COPY src/ /var/www/html/
RUN mkdir /uploads && chmod ugo-rwx /uploads && chmod o+wx /uploads
