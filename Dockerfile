FROM php:8.2-apache

# Extensions PHP nécessaires
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Activer rewrite (utile pour MVC)
RUN a2enmod rewrite

# Copier le projet dans Apache
COPY . /var/www/html

# Permissions
RUN chown -R www-data:www-data /var/www/html

# IMPORTANT : servir le bon dossier (pas /public sauf si tu l’as vraiment)
ENV APACHE_DOCUMENT_ROOT /var/www/html

# Corriger Apache config
RUN sed -ri -e 's!/var/www/html!/var/www/html!g' /etc/apache2/sites-available/*.conf \
 && sed -ri -e 's!/var/www/!/var/www/html!g' /etc/apache2/apache2.conf