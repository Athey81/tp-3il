<?php
$menu = 'user';
include('header.php');

try {
    $connection = new PDO("mysql:host=localhost;dbname=tp;charset=UTF8", 'tp', 'secret');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : '.$e->getMessage();
}

$result = $connection->query('SELECT * FROM user');


?>
<div class="container">
    <?php include('menu.php'); ?>
    <div class="header">
        <ul class="list-group list-group-flush">
            <?php while ($row = $result->fetch()): ?>
                <li class="list-group-item">
                    <a href="user.php?id=<?= $row['id'] ?>">
                        <?= $row['username'] ?>
                    </a>
                </li>
            <?php endwhile ?>
        </ul>
        <a href="user_add.php" class="btn btn-primary">Ajouter un utilisateur</a>
    </div>
</div>
</body>
</html>
