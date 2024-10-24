<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$name = $_POST['name'];

$pdo->query("INSERT INTO `categories`(`name`) VALUES ('$name')");
header('Location: /admin/categories/');