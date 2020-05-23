#!/bin/bash
openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/example.com.key -out /etc/ssl/certs/example.com.crt

sed -i '/ServerAdmin/ a \ServerName example.com' /etc/apache2/sites-available/default-ssl.conf
sed -i '/ServerAdmin/ a \ServerName example.com' /etc/apache2/sites-available/000-default.conf

apachectl configtest
a2enmod ssl
a2ensite default-ssl

service apache2 restart

