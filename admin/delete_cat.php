<?php require_once 'blocks/auth.php'?>
<?php include_once 'blocks/bd.php'?>
<?php include 'blocks/header.php'?>
<div style="width: 700px; margin: 0 auto;">
    <div style="width: 290px; float: left;"><!--Категории-->
        <h3>Удалить выбранную категорию</h3>
        <?php
        $sql_cat = "SELECT * FROM categories ORDER BY id_cat ASC";
        $query_cat = mysql_query($sql_cat) or die(mysql_error());
        while ($row_cat = mysql_fetch_assoc($query_cat)) {
            ?>
            <p><a href="?id_cat=<?=$row_cat['id_cat']?>"><?=$row_cat['name_cat']?></a></p>
            <?php
        }
        ?>
    </div><!--Категории-->

    <div style="width: 400px; float: right;"><!--Ввод кат-->
        <?php
        if (isset($_GET['id_cat'])) {
            $id_cat = $_GET['id_cat'];

            // Проверяем наличие материала в категории
            $sql_cat = "SELECT id_good FROM goods WHERE id_cat = $id_cat";
            $query_cat = mysql_query($sql_cat) or die(mysql_error());
            $num_cat = mysql_num_rows($query_cat);
            if($num_cat > 0) {
                die('<h4>В категории есть товары. Удалите товар, после чего можно удалить категорию.</h4>');
            }
            $sql_del = "DELETE FROM categories WHERE id_cat = $id_cat";
            $query_del = mysql_query($sql_del) or die(mysql_error());

            if ($query_del) {
                echo 'Категория удалена.';
            } else {
                echo 'Запрос на удаление данных не прошел.';
            }
        }
        ?>
        <p>Перейти на <a href="index.php">главную страницу</a> админ зоны</p>
    </div><!--Ввод кат-->
</div>
<?php require 'blocks/footer.php'?>
