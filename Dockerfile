FROM php:7.2-apache

RUN apt-get update \
&& apt-get install -y vim git zlib1g-dev mysql-client libzip-dev cron \
&& docker-php-ext-install zip mysqli pdo_mysql \
&& pecl install xdebug \
&& docker-php-ext-enable xdebug \
&& a2enmod rewrite \
&& sed -i 's!/var/www/html!/var/www/public!g' /etc/apache2/sites-available/000-default.conf \
&& mv /var/www/html /var/www/public \
&& echo "AllowEncodedSlashes On" >> /etc/apache2/apache2.conf

RUN curl -sS https://getcomposer.org/installer | php \
&& mv composer.phar /usr/local/bin/ \
&& ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

RUN chown -R www-data:www-data /var/www

WORKDIR /var/www

RUN mkdir -p /var/www/.composer && chown -R www-data:www-data /var/www/.composer

USER www-data

COPY --chown=www-data:www-data . /var/www/
# COPY --chown=www-data:www-data .env.docker /var/www/.env

RUN composer install --no-interaction --no-progress --no-dev

# RUN php artisan key:generate

USER root

# Add crontab file in the cron directory
ADD docker/crontab /etc/cron.d/laravel-cron

# Give execution rights on the cron job
RUN chmod 0644 /etc/cron.d/laravel-cron

# Apply cron job
RUN crontab /etc/cron.d/laravel-cron

# Create the log file to be able to run tail
RUN touch /var/log/cron.log