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
# Fix MPM conflict by ensuring only prefork is active
RUN a2dismod mpm_event mpm_worker mpm_async 2>/dev/null || true && \
    a2enmod mpm_prefork && \
    a2enmod rewrite && \
    # Remove all mpm_*.load files except prefork from mods-available
    rm -f /etc/apache2/mods-available/mpm_event.* /etc/apache2/mods-available/mpm_worker.* /etc/apache2/mods-available/mpm_async.* && \
    # Create a startup hook to clean mods-enabled on every container start
    echo '#!/bin/bash' > /docker-entrypoint.sh && \
    echo 'rm -f /etc/apache2/mods-enabled/mpm_event.* /etc/apache2/mods-enabled/mpm_worker.* /etc/apache2/mods-enabled/mpm_async.* 2>/dev/null || true' >> /docker-entrypoint.sh && \
    echo 'test -L /etc/apache2/mods-enabled/mpm_prefork.load || a2enmod mpm_prefork' >> /docker-entrypoint.sh && \
    echo 'apache2-foreground' >> /docker-entrypoint.sh && \
    chmod +x /docker-entrypoint.sh

# Default environment variables
ENV DB_HOST=localhost \
    DB_USERNAME=root \
    DB_PASSWORD= \
    DB_NAME=amx \
    TIMEZONE=UTC \
    ERROR_REPORTING=1

# Expose port 80
EXPOSE 80

# Use custom entrypoint to ensure MPM cleanup before Apache starts
ENTRYPOINT ["/docker-entrypoint.sh"]

