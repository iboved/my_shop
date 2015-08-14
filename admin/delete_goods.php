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
        <?php if (isset($_GET['id_cat'])): $id_cat = $_GET['id_cat'];?>
            <h4>Выбранная категория. <span style="color: #F00;"><?=$_GET['name_cat']?></span></h4>
            <h5>Товары по выбранной категории.</h5>
            <?php
            $sql_good = "SELECT * from goods WHERE id_cat = $id_cat";
            $query_good = mysql_query($sql_good) or die(mysql_error());
            while ($row_good = mysql_fetch_assoc($query_good)) {
                ?>
                <p><a href="delete_goods_save.php?id_good=<?=$row_good['id_good']?>"><?=$row_good['name_good']?></a></p>
                <?php
            }
            ?>
        <?php endif ?>
        <p>Перейти на <a href="index.php">главную страницу</a> админ зоны</p>
    </div><!--Ввод кат-->
</div>
<?php require 'blocks/footer.php'?>
