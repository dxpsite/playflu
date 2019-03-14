# PlayFLU
Simplest playout system for Flussonic Media Server based on PHP-Mysql-NGINX 

#### Make sure the Flussonic Media Server already installed!
> Download it from: https://flussonic.com/flussonic-media-server

> Installation guide: https://flussonic.com/doc/quick-start#installation


1. Download all files from this project

2. Extract on your server (ex. /home/playflu/)

3. Change config.php , .aws/credentials and nginx_config/default with your values

4. Import from mysql_config structure and some test data to your database

5. Copy folder [handbrake-bot] into etc/ and go to ssh and execute several commands:
###### #cd /opt/hanbrake-bot
###### #screen
###### #/usr/bin/php -f /opt/handbrake-bot/handbrake-bot.php
###### #/usr/bin/php -f /opt/handbrake-bot/playlist-bot.php

Close terminal and open try again:

Execute from command line:
###### #ps aux | grep handbrake 
or 
###### #ps aux | grep playlist 

for check these processes


#### Some screenshots from PlayFLU:

![alt text](https://subty.ru/images/Screenshot_2.png)
![alt text](https://subty.ru/images/Screenshot_3.png)
![alt text](https://subty.ru/images/Screenshot_4.png)
![alt text](https://subty.ru/images/Screenshot_5.png)
![alt text](https://subty.ru/images/Screenshot_6.png)
![alt text](https://subty.ru/images/Screenshot_7.png)

> Demo access will be soon.




4. Enjoy!
