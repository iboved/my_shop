<?php require_once 'blocks/auth.php'?>
<?php include_once 'blocks/bd.php'?>
<?php include 'blocks/header.php'?>
<div style="width: 700px; margin: 0 auto;">
    <div style="width: 290px; float: left;"><!--Категории-->
        <h3>Категории</h3>
        <?php
        include_once 'blocks/fun.lib.php';
        getMenu();
        ?>
    </div><!--Категории-->

    <div style="width: 400px; float: right;"><!--Ввод кат-->
        <form action="save_cat.php" method="post">
            <label>Новая категория</label><br>
            <input type="text" name="name_cat" size="40">
            <input type="submit" name="submit" value="Добавить категорию">
        </form>
        <p>Перейти на <a href="index.php">главную страницу</a> админ зоны</p>
    </div><!--Ввод кат-->
</div>
<?php require 'blocks/footer.php'?>
