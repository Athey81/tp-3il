<?php

$connection = new PDO("mysql:host=localhost;dbname=tp", 'tp', 'secret');

$result = $connection->query('SELECT id, title, content FROM article WHERE id = '.$_GET['id']);

$row = $result->fetch();

?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Article</title>
    </head>
    <body>
    <h1><?= $row['title'] ?></h1>
    <p><?= $row['content'] ?></p>

    </body>
    </html>

<?php
$connection = null;
?>
