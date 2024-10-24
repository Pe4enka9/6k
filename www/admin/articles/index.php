<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$articles = $pdo->query("SELECT * FROM articles")->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>articles</title>
</head>
<body>
<table>
    <tr>
        <td>#</td>
        <td>name</td>
        <td>text</td>
        <td>created_at</td>
        <td>is_moderated</td>
        <td>categories_id</td>
    </tr>
    <?php foreach ($articles as $article): ?>
        <tr>
            <td><?= $article['id'] ?></td>
            <td><?= $article['name'] ?></td>
            <td><?=$article['text'] ?></td>
            <td><?=$article['created_at'] ?></td>
            <td><?=$article['is_moderated'] ?></td>
            <td><?=$article['categories_id'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>