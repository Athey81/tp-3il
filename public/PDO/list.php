<?php

$connection = new PDO("mysql:host=localhost;dbname=tp", 'tp', 'secret');

$result = $connection->query('SELECT id, title, content FROM article');
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Liste des articles</title>
    </head>
    <body>
    <h1>Liste des articles</h1>
    <ul>
        <?php while ($row = $result->fetch()): ?>
            <li>
                <a href="show.php?id=<?= $row['id'] ?>">
                    <?= $row['title'] ?>
                </a>
            </li>
        <?php endwhile ?>
    </ul>
    </body>
    </html>

<?php
$connection = null;
?>
