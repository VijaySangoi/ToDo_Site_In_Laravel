#!/bin/sh

CONTAINER_FIRST_STARTUP="CONTAINER_FIRST_STARTUP"
if [ ! -e /$CONTAINER_FIRST_STARTUP ]; then
    touch /$CONTAINER_FIRST_STARTUP
    sleep 120
    cd var/www/nothing_todo
    php artisan optimize
    php artisan migrate:fresh
fi
apachectl -D FOREGROUND