<?php

session_start();
include_once 'admin/blocks/bd.php';
include 'admin/blocks/header.php';
require 'blocks/sum.php';
?>
<div> <!--корзина-->
    <h4>Товаров в корзине: <span style="color: red"><?=$count?></span> на сумму: <span style="color: red"><?=$sum?></span> грн.</h4>
</div> <!--корзина-->
<?php
if ($count == 0) {
    echo '<h4>Корзина пуста. Перейти в <a href="index.php">каталог</a> товаров</h4>';
} else {
?>
    <table width="100%" border="1">
        <tr>
            <td>№ п/п</td>
            <td>Товар</td>
            <td>Цена грн</td>
            <td>Количество</td>
            <td>Удалить</td>
        </tr>
<?php
    $sql_basket = "SELECT * FROM goods INNER JOIN basket ON goods.id_good = basket.id_good AND customer = '$session_id'";
    $query_basket = mysql_query($sql_basket) or die(mysql_error());
    $i = 0;
    while ($row_from_basket = mysql_fetch_assoc($query_basket)) {
?>
        <tr>
            <td><?=++$i?></td>
            <td><?=$row_from_basket['name_good']?></td>
            <td><?=$row_from_basket['price_good']?></td>
            <td><?=$row_from_basket['quantity']?></td>
            <td><a href="delete_from_basket.php?id_basket=<?=$row_from_basket['id_basket']?>">Удалить</a></td>
        </tr>
<?php
    }
}
?>
    </table>
    <h4><a href="order.php">Оформить заказ</a></h4>
    <h4>Перейти в <a href="index.php">каталог</a></h4>


<?php require 'admin/blocks/footer.php'?>
