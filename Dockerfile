FROM php:7.4-alpine

COPY . /var/www

# Update config for Docker 
RUN rm /var/www/.env ; mv /var/www/.env.docker /var/www/.env
# Remove all old migration to have a clear workspace
RUn rm -rf /var/www/migrations/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

# Install Yarn
RUN apk add yarn

# Install PDO
RUN docker-php-ext-install pdo_mysql

WORKDIR /var/www

RUN chmod +x /var/www/bin/console

CMD composer install ; yarn install ; yarn encore dev ; bin/console doctrine:database:create ; bin/console make:migration ; bin/console doctrine:migrations:migrate ; bin/console doctrine:fixtures:load ; php -S 0.0.0.0:8000 -t public/
EXPOSE 8000