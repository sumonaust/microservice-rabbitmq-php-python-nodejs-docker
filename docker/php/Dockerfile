FROM php:8.0-apache

RUN apt-get update && apt-get install -y  libcurl4-gnutls-dev git zip \
    && docker-php-ext-install curl bcmath sockets \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

#COPY ./docker/php_receiver/bcmath.ini /etc/php/7.1/cli/conf.d/20-bcmath.ini

COPY ./config/php.ini /usr/local/etc/php/php.ini

RUN curl --silent --show-error https://getcomposer.org/installer | php \
    && mkdir -p /usr/local/bin \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x  /usr/local/bin/composer

RUN mkdir -p /home/composer && chmod 777 /home/composer


# Set the working directory to /app
WORKDIR /var/www/html


COPY ./php-app/composer.json /php-app/composer.lock /var/www/html

# Install the dependencies
RUN composer install --no-dev --prefer-dist --optimize-autoloader

# Copy the rest of the application files to the working directory

COPY ./php-app /var/www/html

# Start the application
# CMD [ "php", "index.php" ]
