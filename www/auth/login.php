<?php

/**@var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

session_start();

$login = $_POST['login'];
$password = $_POST['password'];

$userQuery = $pdo
    ->prepare("SELECT * FROM users WHERE login = :login");

$userQuery->execute(['login' => $login]);

$user = $userQuery->fetch(PDO::FETCH_ASSOC);

if (!$user ||$user['password'] !== $password) {
    header('Location: /login.php');
    exit();
}

$_SESSION['user_id'] = $user['id'];
header('Location: /personal/index.php');