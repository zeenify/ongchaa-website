FROM php:8.2-apache

# PostgreSQL driver + opcache for Joomla (Neon Postgres)
RUN apt-get update \
 && apt-get install -y --no-install-recommends libpq-dev \
 && docker-php-ext-install pdo_pgsql opcache \
 && rm -rf /var/lib/apt/lists/* \
 && a2enmod rewrite headers

# Bind Apache to Render's expected port (PORT env, default 80 locally)
RUN printf 'Listen 0.0.0.0:${PORT}\n' > /etc/apache2/conf-available/zz-render-port.conf \
 && a2enconf zz-render-port
ENV PORT=80

# opcache tuned for an immutable image
RUN printf 'opcache.enable=1\nopcache.memory_consumption=128\nopcache.interned_strings_buffer=16\nopcache.max_accelerated_files=10000\nopcache.validate_timestamps=0\n' > /usr/local/etc/php/conf.d/zz-opcache.ini

# Site files (baked into the image so they survive restarts)
COPY site/ /var/www/html/

# Guarantee the runtime directories Joomla must write to
RUN mkdir -p /var/www/html/cache \
             /var/www/html/tmp \
             /var/www/html/administrator/logs \
             /var/www/html/administrator/cache \
 && chown -R www-data:www-data /var/www/html \
 && find /var/www/html -type d -exec chmod 755 {} \; \
 && find /var/www/html -type f -exec chmod 644 {} \;

EXPOSE 80
