FROM phpdockerio/php73-fpm:latest
WORKDIR /laravel8-jwt/api

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Install git
RUN apt-get update \
    && apt-get -y install git \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install php7.3-memcached php7.3-mysql php7.3-pgsql php7.3-dev php7.3-bcmath php7.3-gd php7.3-imap php7.3-intl php7.3-ldap php7.3-mongodb php7.3-snmp snmp php7.3-soap php7.3-sybase php7.3-opcache php7.3-sqlite sendmail vim \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install PECL
RUN apt-get update \
    && apt-get install -y php-pear php7.3-dev libcurl3-openssl-dev

# Install Xdebug
RUN pecl install -f xdebug-2.9.8

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone