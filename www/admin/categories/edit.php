<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$categoryId = $_GET['id'] ?? '';
$category = $pdo->query("SELECT * FROM categories where id='$categoryId'")->fetch(PDO::FETCH_ASSOC);
?>

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
<form action="/admin/categories/actions/update.php" method="post">
    <input type="hidden" name="id" value="<?= $category['id'] ?>">
    <input type="text" name="name" value="<?=$category['name'] ?>">
    <input type="submit" value="Изменить категорию">
</form>
</body>
</html>