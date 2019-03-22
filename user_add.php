<?php
$menu = 'user';
include('header.php');

$message = null;
if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {

    try {
        $instance = new PDO("mysql:host=localhost;dbname=tp", 'tp', 'secret');
        $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Échec lors de la connexion : '.$e->getMessage();
    }

    if (isset($_POST['admin']) && $_POST['admin'] === 'on') {
        $admin = 1;
    } else {
        $admin = 0;
    }
    $reponse = $instance->prepare('INSERT INTO user (username, password, admin) VALUES(:username, :password, :admin)');
    $reponse->execute(
        [
            'username' => $_POST['username'],
            'password' => password_hash($_POST['password'], PASSWORD_ARGON2I),
            'admin' => $admin
        ]
    );
    $message = "Utilisateur bien ajouté";
}

?>
<script>
    let test = document.getElementById('test');
    test.addEventListener('click', function(event) {
        event.preventDefault();
        test.innerHTML = "Onload"
    });
</script>
<div class="container">
    <?php include('menu.php'); ?>
    <?php
    if ($message !== null) {
        echo "<div class='alert alert-success'>";
        echo $message;
        echo "</div>";
    }
    ?>
        <form method="post">
            <div class="form-group">
                <label>Nom :</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label>Password :</label>
                <input type="text" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label>Administrateur :</label>
                <input type="checkbox" name="admin" class="form-control">
            </div>

            <button id="test" class="btn btn-primary">Ajouter</button>
        </form>
</div>
</body>
</html>
