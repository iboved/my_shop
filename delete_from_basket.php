<?php

session_start();
include_once 'admin/blocks/bd.php';

if (isset($_GET['id_basket'])) {
    $id_basket = $_GET['id_basket'];

    $sql_del = "DELETE FROM basket WHERE id_basket = $id_basket";
    mysql_query($sql_del) or die(mysql_error());

    header('Location: basket.php');
}
