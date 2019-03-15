<?php
$menu = 'article';
include('header.php');

echo "<pre>";

var_dump($_GET);
echo "</pre>";
$connection = new PDO("mysql:host=localhost;dbname=tp", 'tp', 'secret');
$result = $connection->query('SELECT id, title, content FROM article WHERE id = '.$_GET['id']);
$row = $result->fetch();
?>
<div class="container">
    <?php include('menu.php'); ?>
    <div class="header">
        <h1><?= $row['title'] ?></h1>
        <p><?= $row['content'] ?></p>
    </div>
</div>
</body>
</html>
