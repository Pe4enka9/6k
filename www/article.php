<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
    exit();
}

/**@var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$id = $_GET['id']??'';
$article = $pdo->query("SELECT articles.*, categories.name AS category, users.login AS user
FROM articles 
JOIN categories ON articles.categories_id=categories.id
JOIN users ON articles.user_id=users.id WHERE articles.id = $id")->fetch();
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
    <h1><?=$article['name']?></h1>
    <p><?=$article['text']?></p>
    <div><?=$article['category']?></div>
    <div><?=$article['user']?></div>
</body>
</html>