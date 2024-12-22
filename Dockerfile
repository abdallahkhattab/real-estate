# Use the official PHP image
FROM php:8.2-fpm
# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip
# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer
# Set the working directory
WORKDIR /var/www
# Copy the application code
COPY . .
# Set file permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
# Expose port 9000 for PHP-FPM
EXPOSE 9000
# Start PHP-FPM server
CMD ["php-fpm"]
