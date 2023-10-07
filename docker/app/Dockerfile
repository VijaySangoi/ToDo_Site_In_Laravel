FROM ubuntu:latest

ENV DEBIAN_FRONTEND noninteractive
RUN apt update
RUN apt install systemd -y
RUN apt install apache2 -y
RUN mkdir var/www/nothing_todo
RUN apt install php-cli -y -q
RUN apt install php-cgi -yq
RUN apt install php-mysql -yq
RUN apt install composer -yq
RUN service apache2 start