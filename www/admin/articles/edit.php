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
<form action="/admin/articles/actions/update.php" method="post">
    <label for="moder">Модерировано</label>
    <input type="hidden" name="id" value="<?=$_GET["id"] ?? ''?>">
    <input type="checkbox" name="moder" id="moder">
    <input type="submit" value="Сохранить">
</form>
</body>
</html>