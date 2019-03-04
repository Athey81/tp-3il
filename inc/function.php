<?php
function isActive(array $menu)
{
    if (stripos($_SERVER["REQUEST_URI"],$menu['link']) ) {
        return true;
    }
    return false;
}
