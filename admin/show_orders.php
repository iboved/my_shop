<?php include_once 'blocks/bd.php'?>
<?php require_once 'blocks/auth.php'?>

<?php include 'blocks/header.php'?>
<div style="width: 800px; margin: 0 auto; border: #000 thin solid;">
    <table width="100%" border="1">
        <tr>
            <td>ID заказчика</td>
            <td>Имя заказчика</td>
            <td>Телефон</td>
            <td>Адрес доставки</td>
            <td>Дата заказа</td>
            <td>Название товара</td>
            <td>Категория</td>
            <td>Цена</td>
            <td>Общая сумма</td>
        </tr>
        <?php
        $sql_order = "SELECT * FROM orders INNER JOIN goods USING(id_good) LEFT JOIN categories USING(id_cat) ORDER BY id_order DESC";
        $query_order = mysql_query($sql_order) or die(mysql_error());
        $orders = array();
        $sum = 0;

        while ($row_order = mysql_fetch_assoc($query_order)) {
            $orders[] = $row_order;
        }
        for ($i = 0; $i < count($orders); $i++) {
            $sum += $orders[$i]['price_good'];
            ?>
            <tr>
                <td><?=$orders[$i]['customer']?></td>
                <td><?=$orders[$i]['name_order']?></td>
                <td><?=$orders[$i]['phone']?></td>
                <td><?=$orders[$i]['address']?></td>
                <td><?=$orders[$i]['created_at']?></td>
                <td><?=$orders[$i]['name_good']?></td>
                <td><?=$orders[$i]['name_cat']?></td>
                <td><?=$orders[$i]['price_good']?></td>
                <?php
                if ($i+1 < count($orders)) {
                    if ($orders[$i+1]['customer'] != $orders[$i]['customer']) {
                        ?>
                        <td><?=$sum?></td>
                        <?php
                        $sum=0;

                    }
                } else {
                    ?>
                    <td><?=$sum?></td>
                    <?php
                }
                ?>
            </tr>
            <?php
        }
        ?>
        </table>
</div>

<?php require 'blocks/footer.php'?>
