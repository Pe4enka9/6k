<?php

/**@var PDO $pdo */
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
    <title>Document</title>
</head>
<body>
<form action="/personal/articles/actions/store.php" method="post">
    <input type="text" name="name">
    <textarea name="text"></textarea>
    <select name="category">
        <option value="select" selected hidden>Выбрать категорию</option>
        <?php foreach($categories as $category): ?>
        <option value="<?= $category['id']?>"><?= $category['name']?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit">
</form>
</body>
</html>