FROM php:8.3-fpm

# trazer o composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# instalar dependências do sistema + extensões do PHP
RUN apt-get update \
 && apt-get install -y libpq-dev git unzip curl libcurl4-openssl-dev \
 && docker-php-ext-install pdo pdo_pgsql curl \
 # instalar Xdebug
 && pecl install xdebug \
 && rm -rf /tmp/pear

# configure o Xdebug **somente aqui** (sem docker-php-ext-enable)
RUN { \
    echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)"; \
    echo "xdebug.mode=debug"; \
    echo "xdebug.start_with_request=yes"; \
    echo "xdebug.discover_client_host=true"; \
    echo "xdebug.client_host=host.docker.internal"; \
    echo "xdebug.client_port=9003"; \
    echo "xdebug.log=/tmp/xdebug.log"; \
} > /usr/local/etc/php/conf.d/xdebug.ini

# criar arquivo de log do Xdebug e dar permissão
RUN touch /tmp/xdebug.log \
 && chown www-data:www-data /tmp/xdebug.log \
 && chmod 666 /tmp/xdebug.log

# defina pasta de trabalho
WORKDIR /var/www/html

# copie código e instale dependências
COPY . .
RUN composer install --no-interaction --optimize-autoloader \
 && chown -R www-data:www-data storage bootstrap/cache
