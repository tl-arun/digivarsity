#FROM sha256:ac033ee1a907dfe44627170a68eb95da72833ba06e27063ce766a45ed7d76959

## FROM 163742846785.dkr.ecr.ap-south-1.amazonaws.com/php8.2-fpm-base-image@sha256:ac033ee1a907dfe44627170a68eb95da72833ba06e27063ce766a45ed7d76959

FROM php:8.2-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    nginx \
    supervisor \
    curl \
    libpng-dev \
    libzip-dev \
    oniguruma-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    postgresql-dev \
    bash \
    git \
    autoconf \
    g++ \
    make \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
    pdo \
    pdo_mysql \
    pdo_pgsql \
    mbstring \
    zip \
    exif \
    pcntl \
    bcmath \
    gd \
    opcache

# Install Redis extension
RUN pecl install redis \
    && docker-php-ext-enable redis

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy PHP configuration
COPY php.ini /usr/local/etc/php/php.ini

# Copy Nginx configuration
COPY ./docs/default /etc/nginx/http.d/default.conf


# Set up logging directories and permissions for both PHP and Nginx logs
# RUN mkdir -p /var/log/nginx /var/log/php && \
#     touch /var/log/nginx/error.log /var/log/nginx/access.log /var/log/php_errors.log && \
#     chmod -R 666 /var/log/nginx /var/log/php_errors.log
RUN mkdir -p /var/www/html/log/nginx /var/www/html/log/php && \
    touch /var/www/html/log/nginx/error.log /var/www/html/log/nginx/access.log /var/www/html/log/php/php_errors.log && \
    chmod -R 666 /var/www/html/log/nginx/error.log /var/www/html/log/php/php_errors.log && \
    chown -R www-data:www-data /var/www/html/log/nginx/error.log /var/www/html/log/php/php_errors.log

RUN mkdir -p /var/www/html/storage/logs && \
    touch /var/www/html/storage/logs/custom_log.log && \
    chown -R www-data:www-data /var/www/html/storage/logs && \
    chmod -R 775 /var/www/html/storage/logs



# Copy application files
COPY . /var/www/html
WORKDIR /var/www/html

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Set permissions
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

# Copy start script
COPY ./docs/start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 80

CMD ["sh", "/start.sh"]
