
## Run Apache on ~/environment
/etc/apache2/apache2/apache2.conf
```
<Directory /home/ubuntu/environment/>
    Options Indexes FollowSymLinks Includes ExecCGI
    AllowOverride All
    Require all granted
</Directory>
```

/etc/apache2/sites-available $ sudo vi 000-default.conf  
```
<VirtualHost *:80>

        ServerAdmin webmaster@localhost
#       DocumentRoot /var/www/html
        DocumentRoot /home/ubuntu/environment/project


        ProxyPass /app http://localhost:3000
        ProxyPass /app/ http://localhost:3000

        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined

</VirtualHost>
```