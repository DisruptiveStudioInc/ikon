FROM php:8.2-fpm

# Instalar dependencias del sistema y cliente de MySQL
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    libzip-dev \
    libxml2-dev \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libfreetype6-dev \
    libcurl4-openssl-dev \
    default-mysql-client \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pdo_mysql mysqli zip soap \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

EXPOSE 9000

CMD ["php-fpm"]
