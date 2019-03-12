<?php
$menu = 'presentation';
include('header.php');
?>
<div class="container">
    <?php include('menu.php'); ?>
    <div class="header">
        <h1>Présentation</h1>
        <?php
            if (isset($_POST['test'])) {
                echo $_POST['test'];
            }
         ?>
        <form method="post">
            <input type="text" name="test" />
            <button>ok</button>
        </form>
    </div>
</div>
</body>
</html>
