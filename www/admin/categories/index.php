<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$categories = $pdo->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>categories</title>
</head>
<body>
<a href="/admin/categories/create.php">Добавить категорию</a>
<table>
    <tr>
        <td>#</td>
        <td>name</td>
    </tr>
    <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= $category['id'] ?></td>
            <td><?= $category['name'] ?></td>
            <td><a href="/admin/categories/edit.php?id=<?= $category['id'] ?>">Изменить</a></td>
            <td><a href="/admin/categories/actions/delete.php?id=<?= $category['id'] ?>">Удалить</a></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>