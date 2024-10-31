<?php

/**@var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';


$id = $_POST['id'];
$name = $_POST['name'];
$text = $_POST['text'];
$category = $_POST['category'];

$pdo->query("UPDATE articles SET name = '$name', text = '$text', categories_id = '$category' WHERE id = $id");
header("Location: /personal/articles/index.php");