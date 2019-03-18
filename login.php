<?php
$menu = 'login';
include('header.php');

$message = null;
if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {

    try {
        $instance = new PDO("mysql:host=localhost;dbname=tp", 'tp', 'secret');
        $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Échec lors de la connexion : ' . $e->getMessage();
    }
//    $password = password_hash($_POST['password'], PASSWORD_ARGON2I);


    echo $password;
    $reponse = $instance->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
    $reponse->execute([
        'username' => $_POST['username'],
        'password' => $_POST['password']
    ]);
    $row = $reponse->fetch();

    if (is_array($row) === false) {
        $message['color'] =  'danger';
        $message['text'] =  "Utilisateur non trouvé";

    } else {
        $message['color'] =  'success';
        $message['text'] =  "Utilisateur bien trouvé";
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] =  $row['username'];
    }
}

?>
<div class="container">
    <?php include('menu.php'); ?>
    <?php
    if ($message !== null) {
        echo "<div class='alert alert-".$message['color']."'>";
        echo $message['text'];
        echo "</div>";
    }
    ?>
    <div class="header">
        <form method="post">
            <div class="row">
                <div class="col">
                    <label>Nom :</label>
                    <input type="text" name="username">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>Password :</label>
                    <input type="text" name="password">
                </div>
            </div>
            <button>Login</button>
        </form>
    </div>
</div>
</body>
</html>
