FROM php:8.2-apache

ADD php.ini /usr/local/etc/php/
ADD 000-default.conf /etc/apache2/sites-enabled/

# Composerのインストール
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer

# Node.jsとnpmをインストール (必要に応じて)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

RUN apt-get update \
&& apt-get install -y \
git \
zip \
unzip \
vim \
libpng-dev \
libpq-dev \
libcurl4-openssl-dev \
libxml2-dev \
curl \
&& docker-php-ext-install pdo_mysql


RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
RUN /bin/sh -c a2enmod rewrite

# ApacheユーザーのUID/GIDをホストと揃える
RUN groupmod -g 1000 www-data && usermod -u 1000 www-data

# Apacheサーバーの起動
CMD ["apache2-foreground"]