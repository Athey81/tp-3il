<?php
require __DIR__.'/common/header.php';
?>
<h1><?= $article->getTitle() ?></h1>
<p><?= $article->getContent() ?></p>
<a href="/index.php" class="btn btn-primary">Retour à la liste</a>

<?php
require __DIR__.'/common/footer.php';
?>
