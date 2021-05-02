FROM php:7.2.27-fpm-buster
MAINTAINER ruby "854006588@qq.com"

# 设置时区
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

#替换镜像源 有些包更换了镜像之后无法正常build，所以改为默认注释，嫌慢可以自己打开试试
#ENV SOURCELIST_FROM=qinghua
#COPY ./pkg/${SOURCELIST_FROM}_sourcelist /home/sources.list
#RUN mv /etc/apt/sources.list /etc/apt/sources.list.bak && mv /home/sources.list /etc/apt/

# 更新安装依赖包和PHP核心拓展
RUN apt-get update && apt-get install -y \
        librabbitmq-dev \
        git \
        procps \
        vim \
        curl \
        wget \
        lsof \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
		libssl-dev \
        libxml2-dev \
        libgpgme11-dev \
        libmemcached-dev libmsgpack-dev libmsgpackc2 zlib1g-dev  \
	&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
	&& docker-php-ext-install -j$(nproc) gd zip pdo_mysql opcache mysqli bcmath soap sockets \
        && rm -r /var/lib/apt/lists/* \
        &&  pecl install mongodb && echo "extension=mongodb.so" > /usr/local/etc/php/conf.d/mongodb.ini \
        &&  pecl install redis && echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini \
        &&  pecl install amqp 1.9.3 && echo "extension=amqp.so" > /usr/local/etc/php/conf.d/amqp.ini
# 安装 Composer
ENV COMPOSER_HOME /root/composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV PATH $COMPOSER_HOME/vendor/bin:$PATH



# 安装xdebug
RUN pecl install xdebug && \
    docker-php-ext-enable xdebug
COPY ./pkg/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini


# 写权限
WORKDIR /data
RUN usermod -u 1000 www-data

