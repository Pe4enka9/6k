<?php

/**@var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$moder =isset($_POST["moder"]) ? 1 : 0 ;
$id = $_POST["id"] ?? '';

$pdo->query("UPDATE articles SET is_moderated = $moder WHERE id = $id");
header("Location: /admin/articles/index.php");
