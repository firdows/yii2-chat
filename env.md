## Install Composer

    ```
        php composer-setup.php --install-dir=bin --filename=composer
        php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
        php -r "if (hash_file('sha384', 'composer-setup.php') === 'c5b9b6d368201a9db6f74e2611495f369991b72d9c8cbd3ffbc63edff210eb73d46ffbfce88669ad33695ef77dc76976') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
        php composer-setup.php
        php -r "unlink('composer-setup.php');"
        mv composer.phar /usr/local/bin/composer
    ```

## Install PHP

    ```   
        sudo apt-get update
        sudo apt-get install php7.2-gd
        sudo apt-get install php7.2-intl
        sudo apt-get install php7.2-xsl
        sudo apt-get install php7.2-xml
        sudo apt-get install php-mbstring
        sudo apt-get install php7.2-curl
        
    ```
    
## Install Mysql & phpmyadmin

    ``` 
        sudo apt install -y mysql-server
        sudo service mysql status
        sudo mysql -u root
        sudo mysql -u admin -p
        
        sudo apt-get purge phpmyadmin
        sudo apt install phpmyadmin php-mbstring php-gettext
        sudo ln -s /usr/share/phpmyadmin/ ~/environment/
    ```

## Install Yii

    ```
        composer create-project --prefer-dist yiisoft/yii2-app-basic ./
        rm -rf *
        rm -rf .c9
        composer create-project --prefer-dist yiisoft/yii2-app-basic ./
        composer install
        ./yii init
        composer update
    ```


## Connect C9

1. Create Environment
2. Select Connect SSH
3. Copy SSH key
4. Past to /.ssh/authorized_keys
5. Restart ssh
   ``` service ssh restart ```

## Install C9

1. Install NodeJs
    ```apt-get install nodejs```
2. Download C9
    ```wget https://d3w1s6v3q73onm.cloudfront.net/static/c9-install.sh```
3. change mode
    ``` chmon 700 c9-install.sh ```
4. run
    ```./c9-install.sh ```
   

## NodeJs startup

1. Install pm2
    ``` npm install pm2@latest -g ```
2. Set file first run
    ``` pm2 start index.js ```
3. Set startup systemd
    ``` pm2 startup systemd 
        pm2 save
        systemctl enable pm2-root
        systemctl status pm2-root
    ```
4. Monitor
    ``` pm2 show 0
        pm2 monit
        pm2 env 0
        pm2 logs index.js 
        pm2 logs index [--lines 1000]
    ```