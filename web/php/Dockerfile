# Use PHP 8.3 Apache as base image
FROM php:8.3-apache

# Install any PHP extensions you might need
RUN docker-php-ext-install pdo_mysql

# Apache: exactly one MPM (prefork, required by mod_php), mod_rewrite,
# and listen on $PORT (Railway/Heroku-style platforms route to it).
# Apache expands ${PORT} from the environment at startup.
RUN a2dismod -f mpm_event mpm_worker >/dev/null 2>&1 || true \
    && a2enmod mpm_prefork rewrite \
    && sed -ri 's/^Listen 80$/Listen ${PORT}/' /etc/apache2/ports.conf \
    && sed -ri 's/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/' /etc/apache2/sites-available/000-default.conf \
    && echo 'ServerName localhost' > /etc/apache2/conf-available/servername.conf \
    && a2enconf servername \
    && PORT=80 apache2ctl configtest

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the application files
COPY --chown=www-data:www-data src/ .

# Default environment variables (PORT is overridden by the platform at runtime)
ENV PORT=80 \
    DB_HOST=localhost \
    DB_USERNAME=root \
    DB_NAME=amx \
    TIMEZONE=UTC \
    ERROR_REPORTING=1

EXPOSE 80

# Some platforms (e.g. Railway) don't honour deletions from image layers, so
# mpm_event (disabled by the base image) reappears. Re-enforce at startup.
CMD ["sh", "-c", "rm -f /etc/apache2/mods-enabled/mpm_event.* /etc/apache2/mods-enabled/mpm_worker.* && exec apache2-foreground"]
