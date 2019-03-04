<?php

require_once __DIR__ . '/../model/Article.php';
require_once __DIR__ . '/../model/RepositoryInterface.php';
require_once __DIR__ . '/../model/Repository.php';

class ArticleRepository implements RepositoryInterface
{

    public static function add(Article $article): void
    {
        $baseManager = Repository::connect();
        $baseManager->prepare('INSERT INTO Article (title, content) VALUES (:title, :content)', [
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
        ]);
    }

    public static function update(Article $article): void
    {
        $baseManager = Repository::connect();

        $baseManager->prepare('UPDATE Article SET title = :title, content = :content WHERE id = :id', [
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
            'id' => $article->getId(),
        ]);
    }

    public static function find(int $id): ?Article
    {
        $baseManager = Repository::connect();

        $response = $baseManager->fetch('SELECT * FROM Article WHERE id= :id', [
            'id' => $id
        ]);
        $article = Article::load($response['id'], $response['title'], $response['content']);
        return $article;
    }
    public static function findAll(): array
    {
        $baseManager = Repository::connect();

        $listOfArticle = [];
        $responses =$baseManager->fetchAll('SELECT * FROM Article');
        foreach($responses as $response) {
            $listOfArticle[] = Article::load($response['id'], $response['title'], $response['content']);
        }
        return $listOfArticle;
    }

    public static function findByTitle($title): array
    {
        $baseManager = Repository::connect();

        $listOfArticle = [];
        $responses = $baseManager->fetchAllWithParameter('SELECT * FROM Article WHERE title = :title', [
            'title' => $title
        ]);
        foreach($responses as $response) {
            $listOfArticle[] = Article::load($response['id'], $response['title'], $response['content']);
        }
        return $listOfArticle;
    }


}
