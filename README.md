# Wordpress-Docker-compose template.


## 1.Instalation:
```shell
docker-compose up
```
```shell
docker-compose exec wpcli wp config create --dbname=wordpress --dbuser=root --dbpass=rootpass --locale=en_US --dbhost=mariadb
```
```shell
docker-compose exec wpcli wp core download
```


add to wp-config.php
```
define('FS_METHOD', 'direct');
```