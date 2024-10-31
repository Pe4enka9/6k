<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$pdo->query("DELETE FROM articles WHERE id = '{$_GET['id']}'");
header('Location: /personal/articles/');