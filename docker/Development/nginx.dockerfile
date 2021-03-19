FROM nginx:stable-alpine

# Install dev dependencies
RUN apk add --no-cache --virtual .build-deps nginx-module-njs

ADD docker/Development/nginx/nginx.conf /etc/nginx/nginx.conf
ADD docker/Development/nginx/default.conf /etc/nginx/conf.d/default.conf

COPY docker/Development/nginx/request_trace.js /etc/nginx/request_trace.js
COPY docker/Development/nginx/request_trace.conf /etc/nginx/request_trace.conf

RUN mkdir -p /var/www

RUN apk add git

WORKDIR /var/www