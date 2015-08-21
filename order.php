<?php

session_start();
include_once 'admin/blocks/bd.php';
require 'blocks/sum.php';
include 'admin/blocks/header.php';
if ($count == 0) {
    echo '<h4>Корзина пуста - вы не можете оформить закказ. Перейти в <a href="index.php">каталог</a> товаров</h4>';
} else {
?>
<form action="orders_save.php" method="post">
    <label>Заказчик</label><br>
    <input type="text" name="cust" size="40"><br>
    <label>Email заказчика</label><br>
    <input type="email" name="email" size="40"><br>
    <label>Телефон для связи</label><br>
    <input type="text" name="phone" size="40"><br>
    <label>Адрес доставки</label><br>
    <textarea name="address" cols="40" rows="5"></textarea><br>
    <input type="submit" name="submit" value="Оформить заказ">
</form>
<?php
}
require 'admin/blocks/footer.php';
