FROM ubuntu

ENV DEBIAN_FRONTEND noninteractive
RUN apt update
RUN apt install systemd -y
RUN apt install net-tools -y
RUN apt install php -y -q
RUN apt install composer -yq
RUN apt install apache2
RUN mkdir var/www/nothing_todo
CMD apachectl -D FOREGROUND