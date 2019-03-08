<?php


require_once __DIR__.'/../App/App.php';

App\App::load();


// route the request internally
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ('/index.php' === $uri) {
    App\Controller\ArticleController::index();
} elseif ('/index.php/show' === $uri && isset($_GET['id'])) {
    App\Controller\ArticleController::show($_GET['id']);
} elseif ('/index.php/add' === $uri) {
    App\Controller\ArticleController::add();
} else {
header('HTTP/1.1 404 Not Found');
echo '<html><body><h1>Page Not Found</h1></body></html>';
}