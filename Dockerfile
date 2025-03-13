FROM php:8.0.0-apache
ARG DEBIAN_FRONTEND=noninteractive
RUN apt update \
    && apt install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql
RUN apt update \
    && apt install -y libzip-dev zlib1g-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip
RUN a2enmod rewrite