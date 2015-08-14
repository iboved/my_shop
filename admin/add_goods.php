<?php require_once 'blocks/auth.php'?>
<?php include_once 'blocks/bd.php'?>
<?php include 'blocks/header.php'?>
<div style="width: 700px; margin: 0 auto;">
    <div style="width: 290px; float: left;"><!--Товары-->
        <h3>Выбрать категорию</h3>
        <?php
        $sql_cat = "SELECT * FROM categories ORDER BY id_cat ASC";
        $query_cat = mysql_query($sql_cat) or die(mysql_error());
        while ($row_cat = mysql_fetch_assoc($query_cat)) {
            ?>
            <p><a href="?id_cat=<?=$row_cat['id_cat']?>&name_cat=<?=$row_cat['name_cat']?>"><?=$row_cat['name_cat']?></a></p>
            <?php
        }
        ?>
    </div><!--Товары-->

    <div style="width: 400px; float: right;"><!--Ввод товара-->
        <h4>Выбрать категорию для добавление товаров.</h4>
        <?php if (isset($_GET['id_cat'])): $id_cat = $_GET['id_cat'];?>
            <h3 style="color: #F00;"><?=$_GET['name_cat']?></h3>
            <h4>Товары в данной категории.</h4>
            <?php
            $sql_good = "SELECT name_good FROM goods WHERE id_cat = '$id_cat' ORDER BY id_good ASC";
            $query_good = mysql_query($sql_good) or die(mysql_error());
            while ($row_good = mysql_fetch_assoc($query_good)) {
                echo '<p>'.$row_good['name_good'].'</p>';
            }
            ?>
            <form action="add_goods_save.php" method="post">
                <label>Ввести данные по товару</label><br>
                <textarea name="name_good" cols="40" rows="5"></textarea><br>
                <label>Цена товара. Копейки вводите через точку.</label><br>
                <input type="text" name="price_good"><br>
                <input type="hidden" name="cat_id" value="<?=$_GET['id_cat']?>">
                <input type="submit" name="submit" value="Добавить товар">
            </form>
        <?php endif ?>
        <p>Перейти на <a href="index.php">главную страницу </a>админ зоны</p>
    </div><!--Ввод товара-->
</div>
<?php require 'blocks/footer.php'?>
