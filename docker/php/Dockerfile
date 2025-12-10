
# 1. Base Image - MUST be present
FROM php:8.2-fpm-alpine

# 2. Install Dependencies - Customizing the image
RUN apk update && apk add \
    git \
    bash \
    nano \
    mysql-client \
    libzip-dev \
    libpng-dev \
    && docker-php-ext-install pdo_mysql gd opcache

# 3. Working Directory - Setting up the environment
WORKDIR /var/www/html

# 4. Exposure and Command - Defining container behavior
EXPOSE 9000
CMD ["php-fpm"]
