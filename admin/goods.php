<?php require_once 'blocks/auth.php'?>
<?php include_once 'blocks/bd.php'?>
<?php include 'blocks/header.php'?>
<div style="width: 700px; margin: 0 auto;">
    <div style="width: 290px; float: left;"><!--Категории-->
        <h3>Категории</h3>
        <?php
        $sql_cat = "SELECT * FROM categories ORDER BY id_cat ASC";
        $query_cat = mysql_query($sql_cat) or die(mysql_error());
        while ($row_cat = mysql_fetch_assoc($query_cat)) {
            ?>
            <p><a href="?id_cat=<?=$row_cat['id_cat']?>&name_cat=<?=$row_cat['name_cat']?>"><?=$row_cat['name_cat']?></a></p>
            <?php
        }
        ?>
    </div><!--Категории-->

    <div style="width: 400px; float: right;"><!--Ввод кат-->
        <?php if (isset($_GET['id_cat'])): $id_cat = $_GET['id_cat']; $name_cat = $_GET['name_cat'];?>
            <h4>Выбранная категория. <span style="color: #F00;"><?=$_GET['name_cat']?></span></h4>
            <h5>Товары по выбранной категории.</h5>
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

            while ($row_good = mysql_fetch_assoc($query_good)): ?>
                <p><?=$row_good['name_good']?></p>
            <?php endwhile ?>

            <?php
            if ($pageCount > 1) {
                for ($i = 1; $i <= $pageCount; $i++) {
                    echo '<a style="text-decoration:none;" href="?id_cat='.$id_cat.'&name_cat='.$name_cat.'&page='.$i.'"> | ' . $i . ' | </a>';
                }
            }
            ?>
        <?php endif ?>
        <p>Перейти на <a href="index.php">главную страницу</a> админ зоны</p>
    </div><!--Ввод кат-->
</div>
<?php require 'blocks/footer.php'?>
