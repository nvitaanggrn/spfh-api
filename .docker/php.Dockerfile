FROM php:7.4-fpm

WORKDIR /workdir

RUN apt-get update && apt-get upgrade -y \
  && apt-get install -y software-properties-common \
  && apt-get install -y zlib1g-dev libzip-dev unzip libpng-dev libjpeg-dev libicu-dev libpq-dev g++ libqt5gui5 wkhtmltopdf \
  && strip --remove-section=.note.ABI-tag /usr/lib/x86_64-linux-gnu/libQt5Core.so.5 \
  && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
  && apt-get autoremove -y

RUN docker-php-ext-configure intl
RUN docker-php-ext-configure gd --with-jpeg
RUN docker-php-ext-install opcache pgsql pdo_pgsql intl zip gd exif

ENV XDG_RUNTIME_DIR /tmp/xdg_runtime_dir