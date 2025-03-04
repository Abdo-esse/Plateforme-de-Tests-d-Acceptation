FROM php:8.2-apache

# Installer les dépendances nécessaires pour PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev

# Installer les dépendances nécessaires pour PostgreSQL et autres outils
RUN apt-get update && apt-get install -y \
    libpq-dev git zip unzip \
    && docker-php-ext-install pdo pdo_pgsql

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Enable Apache mod_rewrite
RUN a2enmod rewrite

