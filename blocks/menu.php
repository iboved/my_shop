<div style="width: 290px; float: left;"><!--Категории-->
    <h3>Меню</h3>
    <menu>
        <?php
        $sql_cat = "SELECT * FROM categories ORDER BY id_cat ASC";
        $query_cat = mysql_query($sql_cat) or die(mysql_error());
        while ($row_cat = mysql_fetch_assoc($query_cat)) {
            ?>
            <li style="list-style: none;"><a href="?id_cat=<?=$row_cat['id_cat']?>"><?=$row_cat['name_cat']?></a></li>
            <?php
        }
        ?>
    </menu>
</div><!--Категории-->
