FROM php:8.2-apache

# 1. Install driver MySQL & library yang dibutuhkan
RUN docker-php-ext-install pdo pdo_mysql

# 2. Install library pendukung
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# 3. Aktifkan mod_rewrite Apache (PENTING untuk routing)
RUN a2enmod rewrite

# 4. Izinkan .htaccess mengubah konfigurasi (MENGATASI 404)
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# 5. Set Document Root ke folder public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# 6. Copy project & Install Composer
COPY . /var/www/html
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

# 7. BUAT SYMLINK GAMBAR (PENTING untuk Image)
RUN php artisan storage:link

# 8. Set Permission (PENTING agar folder bisa ditulis)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public/storage

EXPOSE 80
