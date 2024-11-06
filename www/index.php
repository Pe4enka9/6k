<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
    exit();
}

/**@var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$cat = $_GET['cat'] ?? 'all';
if ($cat == 'all') {
    $articles = $pdo->query("SELECT articles.*, categories.name AS category, users.login AS user
FROM articles 
JOIN categories ON articles.categories_id=categories.id
JOIN users ON articles.user_id=users.id
                where is_moderated is true")->fetchAll();
} else {
    $articles = $pdo->query("SELECT articles.*, categories.name AS category, users.login AS user
FROM articles 
JOIN categories ON articles.categories_id=categories.id
JOIN users ON articles.user_id=users.id
                where is_moderated is true and articles.categories_id = $cat")->fetchAll();
}

$categories = $pdo->query("SELECT * from categories")->fetchAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class="container">
    <form method="get">
        <select name="cat" class="form-select form-select-sm" style="width: fit-content">
            <option value="all" selected>Все</option>
            <?php foreach ($categories as $category): ?>
                <?php if ($cat == $category['id']): ?>
                    <option value="<?= $category['id'] ?>" selected><?= $category['name'] ?></option>
                <?php else: ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Искать">
    </form>
    <div class="row" style="--bs-gap: .25rem 1rem;">
        <?php foreach ($articles as $article): ?>
            <div class="card col-4" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $article['name'] ?></h5>
                    <p class="card-text"><?= $article['text'] ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Категория <br> <?= $article['category'] ?></li>
                    <li class="list-group-item">Дата опубликования <br> <?= $article['created_at'] ?></li>
                    <li class="list-group-item">Автор <br> <?= $article['user'] ?></li>
                </ul>
                <div class="card-body">
                    <a href="/article.php?id=<?= $article['id'] ?>" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>