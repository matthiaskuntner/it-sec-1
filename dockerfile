FROM php:8.2-apache

COPY ./html/ /var/www/html/
COPY apache2.conf /etc/apache2/
EXPOSE 80

#CMD ["httpd-foreground"]