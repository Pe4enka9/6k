<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Регистрация</h1>
<form action="/auth/register.php" method="post">
<input type="text" name="login" placeholder="Логин">
<input type="password" name="password" placeholder="Пароль">
<input type="submit" value="Регистрация">

    <h3><a href="/login.php">Авторизация</a></h3>
</form>
</body>
</html>
