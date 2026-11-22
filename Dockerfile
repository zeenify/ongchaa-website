FROM php:8.2-apache

# PostgreSQL driver for Joomla (Neon Postgres)
RUN apt-get update \
 && apt-get install -y --no-install-recommends libpq-dev \
 && docker-php-ext-install pdo_pgsql \
 && rm -rf /var/lib/apt/lists/* \
 && a2enmod rewrite headers

# Bind Apache to Render's expected port (PORT env, default 80 locally)
RUN printf 'Listen 0.0.0.0:${PORT}\n' > /etc/apache2/conf-available/zz-render-port.conf \
 && a2enconf zz-render-port
ENV PORT=80

# Site files (baked into the image so they survive restarts)
COPY site/ /var/www/html/

RUN chown -R www-data:www-data /var/www/html \
 && find /var/www/html -type d -exec chmod 755 {} \; \
 && find /var/www/html -type f -exec chmod 644 {} \;

EXPOSE 80
