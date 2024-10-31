<?php

/**@var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

session_start();

$name = $_POST['name'];
$text = $_POST['text'];
$category = $_POST['category'];
$user_id = $_SESSION['user_id'];

$pdo->query("insert into articles(name, text, categories_id, user_id) values('$name', '$text', '$category', '$user_id')");
header('Location: /personal/articles/index.php');