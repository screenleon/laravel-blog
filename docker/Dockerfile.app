FROM php:7.4-fpm
LABEL maintainer "Lien Chen"

COPY . /app/

RUN apt-get update && curl -sL https://deb.nodesource.com/setup_12.x | bash -E - && \
    curl -sL https://dl.yarnpkg.com/debian/pubkey.gpg | gpg --dearmor | tee /usr/share/keyrings/yarnkey.gpg >/dev/null && \
    echo "deb [signed-by=/usr/share/keyrings/yarnkey.gpg] https://dl.yarnpkg.com/debian stable main" | tee /etc/apt/sources.list.d/yarn.list && \
    apt-get install -y yarn nodejs zip && \
    docker-php-ext-install pdo_mysql && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
    

WORKDIR /app

RUN composer install && npm install && npm run dev && \
    apt-get clean