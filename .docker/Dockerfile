FROM php:8.2-fpm

WORKDIR /var/www/html

RUN apt-get update && apt-get install --quiet --yes --no-install-recommends \
libfreetype6-dev \
libjpeg62-turbo-dev \
libpng-dev \
libzip-dev \
zip unzip \
libpq-dev \
default-mysql-client \
gnupg \
wget \
&& docker-php-ext-install pdo pdo_mysql pcntl zip gd\
&& pecl install -o -f redis-5.3.7 mongodb\
&& docker-php-ext-enable redis mongodb

# RUN apt get install php8.1-zip

# RUN docker-php-ext-install zip gd
RUN wget -qO - https://www.mongodb.org/static/pgp/server-4.4.asc | apt-key add - \
    && echo "deb http://repo.mongodb.org/apt/debian buster/mongodb-org/4.4 main" | tee /etc/apt/sources.list.d/mongodb-org-4.4.list \
    && apt-get update \
    && apt-get install -y mongodb-org-tools


COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN groupadd --gid 1000 appuser \
    && useradd --uid 1000 -g appuser \
        -G www-data,root --shell /bin/bash \
        --create-home appuser

USER appuser
