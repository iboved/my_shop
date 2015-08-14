<?php require_once 'blocks/auth.php'?>
<?php require_once 'blocks/bd.php';

if (isset($_POST['cat_id'])) {
    $name_good = $_POST['name_good'];
    $price_good = $_POST['price_good'];
    $cat_id = $_POST['cat_id'];

    if ($name_good == '' || $price_good == '') die('<h4>Вы заполнили не все поля. Верниесь на <a href="add_goods.php">предыдущую страницу</a></h4>');

    // Делаем наш запрос к БД безопасным
    $name_good = mysql_real_escape_string(trim(strip_tags($name_good)));

    if (!is_numeric($price_good)) die('<h4>Вы ввели цену в неправильном формате. Верниесь на <a href="add_goods.php">предыдущую страницу</a></h4>');

    $sql_good = "INSERT INTO goods (id_cat, name_good, price_good) VALUES ('$cat_id', '$name_good', '$price_good')";

    $query_good = mysql_query($sql_good) or die(mysql_error());

    if ($query_good) {
        echo '<h4>Запрос в базу данных на добавление товара прошел. Вернуться на <a href="add_goods.php">предыдущую страницу</a><h4>';
    } else {
        echo 'Запрос не прошел';
    }

}
