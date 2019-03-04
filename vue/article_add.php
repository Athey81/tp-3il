<?php
require __DIR__.'/common/header.php';

if (isset($message)) {
    echo $message;
}
?>

<form method="POST">
    <label>Votre titre</label>
    <input type="text" name="title">
    <label>
    Votre texte</label>
    <textarea name="content"></textarea>
    <button>Ajouter</button>
</form>
<a href="/index.php"  class="btn btn-primary">Retour à la liste</a>
<?php
require __DIR__.'/common/footer.php';
?>
