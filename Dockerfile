# Menggunakan image PHP dengan Apache
FROM php:8.1-apache

# Install dependencies untuk Laravel
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git libzip-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql zip && \
    rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory di dalam container
WORKDIR /var/www/html

# Salin file proyek ke dalam container
COPY . .

# Ubah kepemilikan direktori menjadi www-data
RUN chown -R www-data:www-data /var/www/html

# Install dependensi Laravel menggunakan Composer
RUN composer install --no-dev --optimize-autoloader

# Set permissions untuk direktori storage dan bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80 agar dapat diakses
EXPOSE 80

# Jalankan Apache web server
CMD ["apache2-foreground"]
