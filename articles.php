<?php
$menu = 'article';
include('header.php');

$connection = new PDO("mysql:host=localhost;dbname=tp", 'tp', 'secret');
$result = $connection->query('SELECT id, title, content FROM article');


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
