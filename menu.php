<?php
$menus[] = ['link' =>'index.php', 'name' => 'Accueil'];
$menus[] = ['link' =>'presentation.php', 'name' => 'Présentation'];
$menus[] = ['link' =>'articles.php', 'name' => 'Articles'];
$menus[] = ['link' =>'users.php', 'name' => 'Utilisateurs'];
$menus[] = ['link' =>'login.php', 'name' => 'Login'];
$menus[] = ['link' =>'logout.php', 'name' => 'Logout'];

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
    <?php if (isset($_SESSION['username'])): ?>
        <p>Bienvenue <?= $_SESSION['username']?></p>
    <?php endif ?>
</nav>
