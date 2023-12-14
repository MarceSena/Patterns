# Use a imagem oficial do PHP
FROM php:8.1-apache

RUN apt-get update && \
    apt-get install -y \
    git \
    zip \
    unzip \
    libzip-dev

RUN a2enmod rewrite


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY composer.json ./

RUN composer install --no-scripts --no-autoloader

COPY . .

RUN composer dump-autoload --optimize

RUN chown -R www-data:www-data /var/www/html

RUN chown -R www-data:www-data /var/www/html/public

RUN chmod -R 777 /var/www/html/public

RUN sed -i -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80

CMD ["sh", "-c", "apache2-foreground & composer install && exec tail -f /dev/null"]
