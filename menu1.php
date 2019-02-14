<nav>
    <ul class="menu">
        <li class="test <?php if ($menu === 'index') { ?>active<?php } ?>">
            <a href="index.php">Accueil</a>
        </li>
        <li <?php if ($menu === 'presentation') { ?>class="active"<?php } ?>>
            <a href="presentation.php">Présentation</a>
        </li>
    </ul>
</nav>
