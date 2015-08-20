<?php session_start(); ?>
<?php include_once 'admin/blocks/bd.php'?>
<?php include 'admin/blocks/header.php'?>
<?php require 'blocks/sum.php'?>
<div style="width: 700px; margin: 0 auto;">
    <div> <!--корзина-->
        <h4>Товаров в <a href="basket.php">корзине</a>: <span style="color: red"><?=$count?></span> на сумму: <span style="color: red"><?=$sum?></span> грн.</h4>
    </div> <!--корзина-->

    <?php include 'blocks/menu.php'?>
    <?php include 'blocks/content.php'?>
</div>
<?php require 'admin/blocks/footer.php'?>
