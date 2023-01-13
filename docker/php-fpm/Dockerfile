FROM php:8.1.0-fpm

# Set working directory
WORKDIR /var/www

# Set TIMEZONE
RUN rm /etc/localtime \
    && ln -s /usr/share/zoneinfo/America/Argentina/Buenos_Aires /etc/localtime \
    && "date"

# Install TOOLS
RUN apt-get update \
    && apt-get install -y git curl wget unzip \
    && rm -rf /var/lib/apt/lists/*

# Install OPCACHE extension
RUN docker-php-ext-install opcache

# Install APCU extension
RUN pecl install apcu \
    && docker-php-ext-enable apcu

# Install INTL extension
RUN apt-get update \
    && apt-get install -y libicu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && rm -rf /var/lib/apt/lists/*

# Install ZIP extension
RUN apt-get update \
    && apt-get install -y libzip-dev zip \
    && docker-php-ext-install zip \
    && rm -rf /var/lib/apt/lists/*

# Install PDO MYSQL extension
RUN docker-php-ext-install pdo_mysql

# Install PCOV extension
RUN pecl install pcov \
    && docker-php-ext-enable pcov

# Install COMPOSER
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# Install SYMFONY BINARY
RUN wget https://get.symfony.com/cli/installer -O - | bash \
    && mv ~/.symfony5/bin/symfony /usr/local/bin/symfony

# Copy existing application directory contents
COPY . /var/www

# User permissions
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]