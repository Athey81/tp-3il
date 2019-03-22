<?php
$menu = 'article';
include('header.php');

$result = $repository->query('SELECT * FROM article');

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
