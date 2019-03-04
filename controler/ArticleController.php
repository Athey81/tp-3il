<?php

require __DIR__.'/../model/Article.php';
require __DIR__.'/../model/ArticleRepository.php';

class ArticleController {
    public static function index() {
        $articles = ArticleRepository::findAll();
        require __DIR__.'/../vue/article_list.php';
    }
    public static function show($id) {
        $article = ArticleRepository::find($id);
        require __DIR__.'/../vue/article_show.php';
    }
    public static function add() {
        if (isset($_POST['title']) && isset($_POST['content'])) {
            $article = new Article();
            $article->setTitle($_POST['title']);
            $article->setContent($_POST['content']);
            ArticleRepository::add($article);
            $message = 'Votre article à bien été ajouter';
        }
        require __DIR__.'/../vue/article_add.php';
    }
}
?>