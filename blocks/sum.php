<?php
//session_start();
$session_id = session_id();
//include_once '../admin/blocks/bd.php';

// Определение количества товара в корзине
$sql_basket = "SELECT count(*) FROM basket WHERE customer = '$session_id'";
$query_basket = mysql_query($sql_basket) or die(mysql_error());
$row_basket = mysql_fetch_row($query_basket);
$count = $row_basket[0];

// Определяем общую сумму товаров
$sql_sum = "SELECT price_good FROM goods INNER JOIN basket ON goods.id_good = basket.id_good AND customer = '$session_id'";
$query_sum = mysql_query($sql_sum) or die(mysql_error());
$sum = 0;
while ($row_sum = mysql_fetch_assoc($query_sum)) {
    $sum += $row_sum['price_good'];
}
