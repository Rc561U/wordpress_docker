#!/bin/bash
export $(grep -v '^#' .env | xargs)
docker-compose exec wpcli wp core download
docker-compose exec wpcli wp config create --dbname=$MYSQL_DATABASE --dbuser=$MYSQL_USER --dbpass=$MYSQL_PASSWORD --locale=$LOCALE --dbhost=$MYSQL_HOST
