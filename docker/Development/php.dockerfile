FROM php:7.3-fpm-alpine

ARG CURRENT_USER=${CURRENT_USER:-links}
ARG CURRENT_UID=${CURRENT_UID:-1000}
ARG CURRENT_GID=${CURRENT_GID:-1000}

ENV CURRENT_USER=$CURRENT_USER
ENV CURRENT_UID=$CURRENT_UID
ENV CURRENT_GID=$CURRENT_GID

# Install dev dependencies
RUN apk add --no-cache --virtual .build-deps autoconf \
    curl-dev \
    libtool \
    libxml2-dev

# Install production dependencies
RUN apk add --no-cache \
    bash \
    curl \
    wget \
    g++ \
    git \
    libjpeg-turbo-dev \
    libpng-dev \
    libzip-dev \
    make 

# Install PECL and PEAR  extensions
RUN pecl upgrade timezonedb \
    && rm -rf /tmp/pear

# Enable PECL and PEAR extensions
RUN docker-php-ext-enable timezonedb

# Install php extensions
RUN docker-php-ext-install \
    bcmath \
    calendar \
    curl \
    exif \
    gd \
    iconv \
    mbstring \
    pdo \
    pdo_mysql \
    pcntl \
    tokenizer \
    xml \
    zip

# Cleanup dev dependencies
RUN apk del -f .build-deps

RUN docker-php-source delete

RUN mkdir -p /var/www

RUN (adduser -h /home/${CURRENT_USER} -D -u ${CURRENT_UID} ${CURRENT_USER} \ 
    && mkdir -p /home/$CURRENT_USER \
    && chown -R "${CURRENT_UID}:${CURRENT_UID}" /home/${CURRENT_USER})

USER $CURRENT_USER