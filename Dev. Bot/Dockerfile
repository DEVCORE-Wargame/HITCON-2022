# FROM fauria/lamp
FROM php:8.1-apache

RUN mkdir /var/www/upload
RUN mkdir /var/www/upload/sandbox
RUN chown -R nobody /var/www/upload/sandbox
RUN chmod 333 /var/www/upload/sandbox

RUN sed -i 's/APACHE_RUN_USER:=www-data/APACHE_RUN_USER:=nobody/g' /etc/apache2/envvars
RUN sed -i 's/APACHE_RUN_GROUP:=www-data/APACHE_RUN_GROUP:=nogroup/g' /etc/apache2/envvars

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY www/index.php /var/www/html/index.php
COPY www/config.php /var/www/html/config.php
COPY www/bot.php /var/www/html/bot.php
COPY www/image /var/www/html/image
COPY www/css /var/www/html/css
COPY www/backup.zip /var/www/html/backup.zip
COPY site.conf /etc/apache2/sites-enabled/
COPY flag /flag

RUN chmod 600 /flag
ADD readflag.c /readflag.c
ADD readflag.c /readflag.c
RUN apt -y install gcc && \
gcc /readflag.c -o /readflag && \
chmod +s /readflag

RUN rm /usr/bin/gcc* /usr/bin/g++* /bin/sleep /usr/bin/yes

COPY start.sh /start.sh

CMD ["bash", "/start.sh"]
