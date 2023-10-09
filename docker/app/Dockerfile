FROM ubuntu

ENV DEBIAN_FRONTEND noninteractive
RUN apt update
RUN apt install systemd -y
RUN apt install net-tools -y
RUN apt install php -y -q
RUN apt install php-mysql -y -q
RUN apt install composer -yq
RUN apt install apache2
RUN mkdir var/www/nothing_todo
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf
RUN a2enmod rewrite
ENTRYPOINT ["/var/www/nothing_todo/docker/app/startup.sh"]