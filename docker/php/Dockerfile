FROM php:8.2.2-fpm

RUN rm -rf /var/lib/apt/lists/* \
    && apt-get update \
    && apt-get install -y --no-install-recommends \
    git \
    libzip-dev \
    zip \
    unzip

RUN docker-php-ext-configure \
    zip \
    && docker-php-ext-install \
    pdo \
    pdo_mysql \
    zip

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo 'date.timezone = "Europe/Moscow"\n' > /usr/local/etc/php/conf.d/timezone.ini

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer selfupdate

# Set timezone
ENV TIMEZONE=Etc/UCT
RUN ln -snf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime && echo ${TIMEZONE} > /etc/timezone \
    && printf '[PHP]\ndate.timezone = "%s"\n', ${TIMEZONE} > /usr/local/etc/php/conf.d/tzone.ini \
    && "date"

CMD ["php-fpm", "-F"]

COPY . /var/www/api
WORKDIR /var/www/api

EXPOSE 9000
