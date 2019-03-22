<?php
$menu = 'login';
include('header.php');

$message = null;
if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {

    $reponse = $repository->prepare('SELECT * FROM user WHERE username = :username', [
        'username' => $_POST['username'],
    ]);
    $row = $reponse->fetch();


    if (password_verify($_POST['password'], $row['password'])) {
        $message['color'] =  'success';
        $message['text'] =  "Utilisateur bien trouvé";
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] =  $row['username'];
        if ($row['admin'] === "1") {
            $_SESSION['admin'] = true;
        } else {
            $_SESSION['admin'] = false;
        }
    } else {
        $message['color'] =  'danger';
        $message['text'] =  "Utilisateur non trouvé";

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

    if (!isset($_SESSION['id'])) {
    ?>

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
    <?php } ?>
</div>
</body>
</html>
