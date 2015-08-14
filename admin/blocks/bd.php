<?php

mysql_connect('localhost', 'root', '1232580') or die('Подключение к серверу MySQL не удалась');
mysql_select_db('my_shop') or die(mysql_error());
mysql_set_charset( 'utf8' );
