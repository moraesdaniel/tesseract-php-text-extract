FROM php:8.1-bullseye
WORKDIR /var/www
RUN apt-get update
RUN apt-get install -y tesseract-ocr-por
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer