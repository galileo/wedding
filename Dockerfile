FROM php:7-apache

RUN apt-get update && apt-get install -y postgresql-dev

RUN docker-php-ext-install pdo pdo_pgsql

RUN yes | pecl install xdebug

RUN echo 'zend_extension=xdebug.so' >> "${PHP_INI_DIR}/conf.d/20-xdebug.ini"
RUN echo 'xdebug.remote_enable = 1' >> "${PHP_INI_DIR}/conf.d/20-xdebug.ini"
RUN echo 'xdebug.remote_connect_back = 1' >> "${PHP_INI_DIR}/conf.d/20-xdebug.ini"
RUN echo 'xdebug.remote_autostart = 1' >> "${PHP_INI_DIR}/conf.d/20-xdebug.ini"
