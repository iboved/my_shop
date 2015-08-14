<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Вход в административную зону</title>
    <style>
        p { color:  navy; }
    </style>
</head>
<body>
<div style="width: 350px; margin: 0 auto; border: #000 thick solid; margin-top: 40px;">
    <form action="login_save.php" method="post">
        <label>Введите логин</label><br>
        <input type="text" name="users_login"><br>
        <label>Введите пароль</label><br>
        <input type="password" name="users_password"><br>
        <input type="submit" name="submit" value="Вход в админ зону">
    </form>
</div>
</body>
</html>
