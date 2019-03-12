<?php
$menus[] = ['link' =>'index.php', 'name' => 'Accueil'];
$menus[] = ['link' =>'presentation.php', 'name' => 'Présentation'];
$menus[] = ['link' =>'articles.php', 'name' => 'Articles'];

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
