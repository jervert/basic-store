FROM debian:bookworm
RUN apt-get update
RUN apt-get install -y php-fpm php-gd php-imagick php-mysql php-gd

RUN sed -i 's,;daemonize = yes,daemonize = no,g' /etc/php/8.2/fpm/php-fpm.conf
RUN sed -i 's,listen = /run/php/php8.2-fpm.sock,listen = 9000,g' /etc/php/8.2/fpm/pool.d/www.conf

#RUN sed -i 's,;extension=pdo_mysql,extension=pdo_mysql,g' /etc/php/8.2/fpm/php.ini
#RUN sed -i 's,;extension=gd,extension=gd,g' /etc/php/8.2/fpm/php.ini

CMD ["php-fpm8.2","--nodaemonize"]
EXPOSE 9000
