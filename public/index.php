<?php

require_once __DIR__ . '/../controler/ArticleController.php';

// route the request internally
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ('/index.php' === $uri) {
    ArticleController::index();
} elseif ('/index.php/show' === $uri && isset($_GET['id'])) {
    ArticleController::show($_GET['id']);
} elseif ('/index.php/add' === $uri) {
    ArticleController::add();
} else {
header('HTTP/1.1 404 Not Found');
echo '<html><body><h1>Page Not Found</h1></body></html>';
}