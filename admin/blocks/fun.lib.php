<?php

function getMenu() {
    $sql_cat = "SELECT name_cat FROM categories ORDER BY id_cat";
    $query_cat = mysql_query($sql_cat) or die(mysql_error());
    while ($row_cat = mysql_fetch_assoc($query_cat)) {
        echo '<p>'.$row_cat['name_cat'].'</p>';
    }
    return 0;
}