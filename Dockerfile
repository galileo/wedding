FROM galileo/php:5.6-apache-advanced

COPY . /var/www/html

RUN chmod 777 -R /var/www/html/var