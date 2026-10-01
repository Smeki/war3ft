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
    # Remove competing MPM configuration files
    rm -f /etc/apache2/mods-available/mpm_event.* /etc/apache2/mods-available/mpm_worker.* /etc/apache2/mods-available/mpm_async.*

# Default environment variables
ENV DB_HOST=localhost \
    DB_USERNAME=root \
    DB_PASSWORD= \
    DB_NAME=amx \
    TIMEZONE=UTC \
    ERROR_REPORTING=1

# Expose port 80
EXPOSE 80

# Use the base image's default entrypoint but with a wrapper script that cleans MPM before starting
RUN echo '#!/bin/bash' > /entrypoint.sh && \
    echo 'set -e' >> /entrypoint.sh && \
    echo '# Clean up competing MPM modules that may have been re-enabled' >> /entrypoint.sh && \
    echo 'rm -f /etc/apache2/mods-enabled/mpm_event.* /etc/apache2/mods-enabled/mpm_worker.* /etc/apache2/mods-enabled/mpm_async.* 2>/dev/null || true' >> /entrypoint.sh && \
    echo '# Ensure mpm_prefork is enabled' >> /entrypoint.sh && \
    echo 'test -L /etc/apache2/mods-enabled/mpm_prefork.load || a2enmod mpm_prefork' >> /entrypoint.sh && \
    echo '# Run the base image entrypoint' >> /entrypoint.sh && \
    echo 'exec docker-php-entrypoint apache2-foreground' >> /entrypoint.sh && \
    chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]

