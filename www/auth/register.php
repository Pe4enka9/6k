<?php
//auth/register.php

/**@ver PDO */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

session_start();

$login = $_POST['login'];
$password = $_POST['password'];

$query = $pdo->prepare('INSERT INTO users (login, password) VALUES (?, ?)');
$query->execute([$login, $password]);

$userQuery = $pdo
    ->prepare("SELECT * FROM users WHERE login = :login");
$userQuery->execute(['login' => $login]);
$user = $userQuery->fetch(PDO::FETCH_ASSOC);

$_SESSION['user_id'] = $user['id'];
header('Location: /personal/index.php');