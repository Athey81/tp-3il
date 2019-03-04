<?php
class Article
{
    protected $id;

    protected $title;

    protected $content;

    public static function load($id, $title, $content)
    {
        $article = new self();
        $article->setId($id);
        $article->setTitle($title);
        $article->setContent($content);
        return $article;

    }

    public function getId(): int
    {
        return $this->id;
    }

    private function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

}

 ?>
