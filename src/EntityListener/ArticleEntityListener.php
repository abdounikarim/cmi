<?php

namespace App\EntityListener;

use App\Entity\Article;
use DateTimeImmutable;
use Symfony\Component\String\Slugger\AsciiSlugger;

final class ArticleEntityListener
{
    private AsciiSlugger $slugger;

    public function __construct()
    {
        $this->slugger = new AsciiSlugger();
    }

    public function prePersist(Article $article): void
    {
        $article
            ->setCreatedAt(new DateTimeImmutable())
            ->setSlug($this->slugger->slug($article->getTitle())->lower())
        ;
    }

    public function preUpdate(Article $article): void
    {
        $article
            ->setUpdatedAt(new DateTimeImmutable())
            ->setSlug($this->slugger->slug($article->getTitle())->lower())
        ;
    }
}
