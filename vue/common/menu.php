<?php
$menus[] = ['link' =>'index.php', 'name' => 'Accueil'];
$menus[] = ['link' =>'presentation.php', 'name' => 'Présentation'];
?>

<nav>
    <ul class="menu">
        <?php foreach($menus as $menu) :?>
            <li >
                <a href="<?= $menu['link']; ?>"><?= $menu['name']; ?></a>
            </li>
        <?php endforeach ?>
    </ul>
</nav>
