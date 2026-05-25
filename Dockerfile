FROM php:8.2-apache

# Extensions PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Activation rewrite Apache
RUN a2enmod rewrite

# Copier le projet
COPY . /var/www/html

# Permissions
RUN chown -R www-data:www-data /var/www/html

# IMPORTANT : dossier public MVC
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Modifier Apache vers /public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Autoriser .htaccess
RUN echo '<Directory /var/www/html/public>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/custom.conf \
    && a2enconf custom

WORKDIR /var/www/html
