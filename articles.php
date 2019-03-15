<?php
$menu = 'article';
include('header.php');

try {
    $connection = new PDO("mysql:host=localhost;dbname=tp;charset=UTF8", 'tp', 'secret');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}

$result = $connection->query('SELECT * FROM article');


?>
<div class="container">
    <?php include('menu.php'); ?>
    <div class="header">
        <?php while ($row = $result->fetch()): ?>
            <li>
                <a href="article.php?id=<?= $row['id'] ?>">
                    <?= $row['title'] ?>
                </a>
            </li>
        <?php endwhile ?>
        <a href="article_add.php">Ajouter un article</a>
    </div>
</div>
</body>
</html>
