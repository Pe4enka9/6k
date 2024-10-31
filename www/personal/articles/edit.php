<?php

/**@var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$categories = $pdo->query("SELECT * FROM categories");
$article = $pdo->query("SELECT * FROM articles WHERE id = '" . $_GET['id'] . "'")->fetch();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/personal/articles/actions/update.php" method="post">
    <input type="hidden" name="id" value="<?=$_GET["id"] ?? ''?>">
    <input type="text" name="name" value="<?=$article["name"] ?? ''?>">
    <textarea name="text"><?=$article["text"] ?? ''?></textarea>
    <select name="category">
        <?php foreach($categories as $category): ?>
        <?php if($category["id"] == $_GET["id"]): ?>
        <option value="<?= $category['id'] ?>" selected><?= $category['name']?></option>
            <?php else: ?>
                <option value="<?= $category['id'] ?>"><?= $category['name']?></option>
        <?php endif;?>
        <?php endforeach;?>
    </select>
    <input type="submit">
</form>
</body>
</html>