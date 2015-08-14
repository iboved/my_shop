<?php

require_once 'blocks/auth.php';
// Подключаем базу данных
include_once 'blocks/bd.php';

// Проверяем наличие глобального массива POST
if (isset($_POST['name_cat'])) {
    $name_cat = $_POST['name_cat'];
}

if ($name_cat == '') {
    die('Вы не ввели в поле данные. Вернуться на <a href="add_cat.php">предыдущую страницу</a>');
}

// Делаем наш запрос к БД безопасным
// удаляем HTML и PHP теги из строки
$name_cat = strip_tags($name_cat);

// Удаляем пробелы из начала и конца строки
$name_cat = trim($name_cat);

// Экранируем спецсимволы
$name_cat = mysql_real_escape_string($name_cat);

$sql_cat = "INSERT INTO categories (name_cat) VALUES ('$name_cat')";

$query_cat = mysql_query($sql_cat) or die(mysql_error());

if ($query_cat) {
    echo '<h4>Запрос в базу данных на добавление категории прошел. Вернуться на <a href="add_cat.php">предыдущую страницу</a><h4>';
} else {
    echo 'Запрос не прошел';
}
