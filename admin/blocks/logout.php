<?php

// файл выводит из админ зоны
// открываем сессию
session_start();
$_SESSION = array();
session_destroy();

header('Location: ../../index.php');
