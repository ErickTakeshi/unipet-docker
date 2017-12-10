FROM php:7.0.8-apache
RUN a2enmod 

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng12-dev \
    zlib1g-dev \
    libicu-dev \
    g++ \

    # Enable mod_rewrite and vhost_alias
    && a2enmod rewrite \
    && a2enmod vhost_alias \
    && a2enmod headers \

    # Install PHP extensions
    && docker-php-ext-install pdo_mysql zip \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-configure intl \
    && docker-php-ext-install -j$(nproc) intl


# Fix write permissions with shared folders
RUN usermod -u 1000 www-data
RUN usermod -G staff www-data

COPY apache2.conf /etc/apache2/apache2.conf
WORKDIR /var/www/html
COPY unipet/ /var/www/html

RUN chmod 0777 client/runtime
RUN chmod 0777 client/web/assets
RUN chmod 0755 client/yii
RUN chmod 0777 server/runtime
RUN chmod 0777 server/web/assets
RUN chmod 0755 server/yii
RUN chgrp -R www-data *