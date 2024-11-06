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
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin</title>
</head>
<body>
<a href="/admin/articles/">Статьи</a>
<a href="/admin/categories/">Категории</a>
</body>
</html>