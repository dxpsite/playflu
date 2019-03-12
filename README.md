# PlayFLU
Simplest playout system for Flussonic Media Server based on PHP-Mysql-NGINX 

##### Make sure the Flussonic Media Server already installed!
Download it from: https://erlyvideo.ru/flussonic-media-server

1. Download all files from this project

2. Extract on your server (ex. /home/crud/)

3. Change config.php , .aws/credentials and nginx_config/default with your values

4. Import from mysql_config structure and some test data to your database

5. Copy folder [handbrake-bot] into etc/ and go to ssh and execute several commands:
###### #cd /opt/hanbrake-bot
###### #screen
###### #/usr/bin/php5.6 -f /opt/handbrake-bot/handbrake-bot.php
###### #/usr/bin/php5.6 -f /opt/handbrake-bot/playlist-bot.php

Close terminal and open new again:

Execute from command line:
###### #ps aux | grep handbrake 
or 
###### #ps aux | grep playlist 

for check these processes



4. Enjoy!
