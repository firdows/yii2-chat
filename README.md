


## Run Apache on ~/environment
/etc/apache2/sites-available $ sudo vi 000-default.conf  
`
<Directory /home/ubuntu/environment/>
    Options Indexes FollowSymLinks Includes ExecCGI
    AllowOverride All
    Require all granted
</Directory>
`