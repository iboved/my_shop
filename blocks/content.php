<div style="width: 400px; float: right;">
    <?php if (isset($_GET['id_cat'])): ?>
        <?php
        $id_cat = $_GET['id_cat'];
        $sql_cat = "SELECT name_cat FROM categories WHERE id_cat = $id_cat";
        $query_cat = mysql_query($sql_cat) or die(mysql_error());
        $row_cat = mysql_fetch_assoc($query_cat);
        ?>
        <h4 style="color: #F00;"><?=$row_cat['name_cat']?></h4>
        <?php
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $limit = 5; // количество выводов на товаров на странице
        $offset = ($page-1) * $limit; // сдвиг

        $sql_num = "SELECT id_good FROM goods WHERE id_cat = $id_cat ";
        // Количество выведенных товаров в данной категории
        $rows = mysql_num_rows(mysql_query($sql_num));

        // Делим количество товаров и округляем в большую сторону
        $pageCount = ceil($rows / $limit);

        $sql_good = "SELECT * from goods WHERE id_cat = '$id_cat' ORDER BY id_good LIMIT $offset, $limit";
        $query_good = mysql_query($sql_good) or die(mysql_error());
        echo '<table width="100%">';

        while ($row_good = mysql_fetch_assoc($query_good)): ?>
            <tr>
                <td><p><?=$row_good['name_good']?></p></td>
                <td><p><?=$row_good['price_good']?> грн.</p></td>
                <td><a href="add_basket.php?id_good=<?=$row_good['id_good']?>">в корзину</a></td>
            </tr>
        <?php endwhile ?>

        <?php
        echo '</table>';
        if ($pageCount > 1) {
            for ($i = 1; $i <= $pageCount; $i++) {
                echo '<a style="text-decoration:none;" href="?id_cat='.$id_cat.'&page='.$i.'"> | ' . $i . ' | </a>';
            }
        }
        echo '<br><br>';
        ?>
    <?php else: ?>
        <h1>Добро пожаловать в интернет магазин!</h1>
    <?php endif ?>
</div>
