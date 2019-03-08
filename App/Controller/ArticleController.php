<?php

namespace App\Controller;

use App\Model\ArticleRepository;
use App\Model\Article;

class ArticleController {
    public static function index() {
        $articles = ArticleRepository::findAll();
        require __DIR__.'/../Vue/article_list.php';
    }
    public static function show($id) {
        $article = ArticleRepository::find($id);
        require __DIR__.'/../Vue/article_show.php';
    }
    public static function add() {
        if (isset($_POST['title']) && isset($_POST['content'])) {
            $article = new Article();
            $article->setTitle($_POST['title']);
            $article->setContent($_POST['content']);
            ArticleRepository::add($article);
            $message = 'Votre article à bien été ajouter';
        }
        require __DIR__.'/../Vue/article_add.php';
    }
}
?>