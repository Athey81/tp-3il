<?php
$menus[0]['link'] = 'index.php';
$menus[0]['name'] = 'Accueil';
$menus[1]['link'] = 'presentation.php';
$menus[1]['name'] = 'Présentation';

function isActive(array $menu)
{
    if (stripos($_SERVER["REQUEST_URI"],$menu['link']) ) {
        return true;
    }
    return false;
}
?>

<nav>
    <ul class="menu">
        <?php foreach($menus as $menu) {?>
            <li <?php if(isActive($menu)) {?> class="active" <?php } ?>>
                <a href="<?php echo $menu['link']; ?>"><?php echo $menu['name']; ?></a>
            </li>
        <?php } ?>
    </ul>
</nav>
