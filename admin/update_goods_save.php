<?php

require_once 'blocks/auth.php';
include_once 'blocks/bd.php';

if (isset($_POST['id_good'])) {
    $id_cat = $_POST['id_cat'];
    $id_good = $_POST['id_good'];
    $name_good = $_POST['name_good'];
    $price_good = $_POST['price_good'];

    if (empty($id_cat) || empty($name_good) || empty($price_good)) {
        die('Вы не заполнили все поля. Верниесь на <a href="update_goods.php">предыдущую страницу</a>');
    }
    // Делаем наш запрос к БД безопасным
    $name_good = mysql_real_escape_string(trim(strip_tags($name_good)));

    if (!is_numeric($price_good)) die('<h4>Вы ввели цену в неправильном формате. Вернитесь на <a href="update_goods.php">предыдущую страницу</a></h4>');

    $sql_up = "UPDATE goods SET id_cat = '$id_cat', name_good = '$name_good', price_good = '$price_good' WHERE id_good = '$id_good'";

    $query_up = mysql_query($sql_up) or die(mysql_error());

    if ($query_up) {
        echo '<h4>Запрос в базу данных на добавление категории прошел. Вернуться на <a href="update_goods.php">предыдущую страницу</a><h4>';
    } else {
        echo 'Запрос не прошел';
    }
}
