<?php
/**@var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$articles = $pdo->query("SELECT articles.*, categories.name AS category, users.login AS user
FROM articles 
JOIN categories ON articles.categories_id=categories.id
JOIN users ON articles.user_id=users.id
                where is_moderated is true")->fetchAll();
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
<style>
    table, th, td {
        padding: 5px;
        border: 1px solid #000;
        border-collapse: collapse;
    }
</style>
<body>
    <table>
        <tr>
            <th>Название</th>
            <th>Описание</th>
            <th>Дата создания</th>
            <th>Категория</th>
            <th>Пользователь</th>
        </tr>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td><?=$article['name']?></td>
                <td><?=$article['text']?></td>
                <td><?=$article['created_at']?></td>
                <td><?=$article['category']?></td>
                <td><?=$article['user']?></td>
                <td><a href="/article.php?id=<?=$article['id']?>">Подробнее</a></td>
            </tr>
        <?php endforeach;?>
    </table>
</body>
</html>