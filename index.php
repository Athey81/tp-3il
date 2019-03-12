<?php
$menu = 'index';
include('header.php');
?>
<div class="container">
    <?php include('menu.php'); ?>
    <div class="header">
        <?php
            $array = ['test1', 'test2', 'test3'];

            foreach ($array as $key) {
                echo $key . '<br>';
            }


         ?>
    </div>
</div>
</body>
</html>
