# Use PHP 8.3 Apache as base image
FROM php:8.3-apache

# Install any PHP extensions you might need
RUN docker-php-ext-install pdo_mysql

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the application files
COPY src/ .

# Set proper permissions for Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Apache configuration to handle .htaccess if needed
RUN a2dismod mpm_event && \
    a2enmod mpm_prefork && \
    a2enmod rewrite && \
    rm -f /etc/apache2/mods-enabled/mpm_*.load && \
    rm -f /etc/apache2/mods-available/mpm_event.* && \
    echo "LoadModule mpm_prefork_module modules/mod_mpm_prefork.so" > /etc/apache2/mods-enabled/mpm_prefork.load

# Default environment variables
ENV DB_HOST=localhost \
    DB_USERNAME=root \
    DB_PASSWORD= \
    DB_NAME=amx \
    TIMEZONE=UTC \
    ERROR_REPORTING=1

# Expose port 80
EXPOSE 80

# Apache runs automatically in this image, so no need for CMD 