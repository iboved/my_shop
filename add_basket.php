<?php

session_start();
include_once 'admin/blocks/bd.php';

if (isset($_GET['id_good'])) {
    $id_good = $_GET['id_good'];
    $customer = session_id();
    $quantity = 1;
    $created_at = (new DateTime())->format('Y-m-d H:i:s');

    $sql_add_basket = "INSERT INTO basket (customer, id_good, quantity, created_at) VALUES ('$customer', '$id_good', '$quantity', '$created_at')";
    $query_add_basket = mysql_query($sql_add_basket) or die(mysql_error());

    header("Location: {$_SERVER['HTTP_REFERER']}");
}
