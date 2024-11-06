<?php


session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
    exit();
}

/**@var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$is_admin = $pdo->query("SELECT * FROM users WHERE id = '{$_SESSION['user_id']}' and is_admin is true");
if ($is_admin->rowCount() < 1) {
    header('Location: /index.php');
    exit();
}

$articles = $pdo->query("SELECT articles.*, categories.name AS category, users.login AS user
FROM articles 
JOIN categories ON articles.categories_id=categories.id
JOIN users ON articles.user_id=users.id")->fetchAll();
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
        <td>№</td>
        <td>Название</td>
        <td>Текст</td>
        <td>Дата опубликования</td>
        <td>Модерация</td>
        <td>Категория</td>
        <td>Автор</td>
    </tr>
    <?php foreach ($articles as $article): ?>
        <tr>
            <td><?= $article['id'] ?></td>
            <td><?= $article['name'] ?></td>
            <td><?=$article['text'] ?></td>
            <td><?=$article['created_at'] ?></td>
            <td><?=$article['is_moderated'] ? 'Да' : 'Нет'?></td>
            <td><?=$article['category'] ?></td>
            <td><?=$article['user']?></td>
            <td><a href="/admin/articles/edit.php?id=<?= $article['id'] ?>">Изменить</a></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>