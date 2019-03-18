<?php
$menu = 'user';
include('header.php');

$connection = new PDO("mysql:host=localhost;dbname=tp", 'tp', 'secret');
$result = $connection->query('SELECT * FROM user WHERE id = '.$_GET['id']);
$row = $result->fetch();
?>
<div class="container">
    <?php include('menu.php'); ?>
    <div class="header">
        <h1><?= $row['username'] ?></h1>
    </div>
</div>
</body>
</html>
