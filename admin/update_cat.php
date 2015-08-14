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
        <?php if (isset($_GET['id_cat'])): ?>
            <form action="update_cat_save.php" method="post">
                <label>Выбраная категория</label><br>
                <input type="text" name="name_cat" size="40" value="<?=$_GET['name_cat']?>"><br/><br/>
                <input type="hidden" name="id_cat" value="<?=$_GET['id_cat']?>">
                <input type="submit" name="submit" value="Изменить категорию">
            </form>
        <?php endif ?>
        <p>Перейти на <a href="index.php">главную страницу</a> админ зоны</p>
    </div><!--Ввод кат-->
</div>
<?php require 'blocks/footer.php'?>
