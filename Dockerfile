FROM php:8.2-cli

# Install system dependencies
RUN apt-get update \
    && apt-get install -y git curl unzip libpng-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm@10 \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY src/ .

RUN composer install \
    && npm install \
    && npm run build \
    && php artisan key:generate

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
