<?php

// авторизация в админ зоне
session_start();

if (isset($_SESSION['users_login'])) {
    $users_login = $_SESSION['users_login'];
}

if(!isset($users_login)) {
    header('Location: login.php');
}
