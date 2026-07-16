FROM php:8.4-cli

WORKDIR /var/www/html

# Extensions PHP nécessaires Laravel + PostgreSQL
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libpq-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_pgsql

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier le projet
COPY . .

# Installer dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Installer dépendances frontend et compiler Vite
RUN npm install
RUN npm run build

# Optimisation Laravel
RUN php artisan storage:link || true

RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

EXPOSE 8080

CMD php artisan serve --host=0.0.0.0 --port=8080
