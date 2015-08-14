<?php

require_once 'blocks/auth.php';
include_once 'blocks/bd.php';

if (isset($_GET['id_good'])) {
    $id_good = $_GET['id_good'];
    $sql_del = "DELETE FROM goods WHERE id_good = $id_good";

    $query_del = mysql_query($sql_del) or die(mysql_error());

    if ($query_del) {
        echo '<h4>Запрос в базу данных на добавление категории прошел. Вернуться на <a href="delete_goods.php">предыдущую страницу</a><h4>';
    } else {
        echo 'Запрос не прошел';
    }
}