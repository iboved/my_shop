<?php require_once 'blocks/auth.php'?>
<?php include_once 'blocks/bd.php'?>
<?php include 'blocks/header.php'?>
<div style="width: 700px; margin: 0 auto;">
    <div><!--Категории-->
        <h3>Категории</h3>
        <?php
        include_once 'blocks/fun.lib.php';
        getMenu();
        ?>
        <p>Перейти на <a href="index.php">главную страницу</a> админ зоны</p>
    </div><!--Категории-->
</div>
<?php require 'blocks/footer.php'?>
