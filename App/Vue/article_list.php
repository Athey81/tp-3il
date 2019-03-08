<?php
require __DIR__.'/common/header.php';
?>

<h1>Liste des articles</h1>
<ul>
    <?php foreach($articles as $article): ?>
        <li>
            <a href="index.php/show?id=<?= $article->getId() ?>">
                <?= $article->getTitle() ?>
            </a>
        </li>
    <?php endforeach; ?>
    <a href="index.php/add" class="btn btn-primary">Ajouter</a>
</ul>

<?php
require __DIR__.'/common/footer.php';
?>
