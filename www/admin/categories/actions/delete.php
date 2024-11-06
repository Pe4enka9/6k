<?php

/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$id = $_GET['id'];
try {
    $pdo->query('DELETE FROM categories WHERE id=' .$id);
} catch (PDOException $e) {
    die('Невозможно удаление, так как пристутсвуют записи с данной категорией');
}
header('Location: /admin/categories/');