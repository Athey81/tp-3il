<?php

interface RepositoryInterface
{
    public static function add(Article $article);
    public static function update(Article $article);
    public static function find(int $id);
    public static function findAll();

}