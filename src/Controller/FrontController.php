<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    #[Route('/', name: 'front')]
    public function index(ArticleRepository $articleRepository, CommentRepository $commentRepository): Response
    {
        return $this->render('front/index.html.twig', [
            'articles' => $articleRepository->findAll(),
            'comments' => $commentRepository->findBy([
                'parent' => null,
            ], [
                'id' => 'DESC'
            ]),
        ]);
    }

    #[Route('/article/{id}', name: 'front_article')]
    public function article(Article $article): Response
    {
        return $this->render('front/article.html.twig', [
            'article' => $article,
        ]);
    }

    #[Route('/comment/{id}', name: 'front_comment')]
    public function comment(Comment $comment): Response
    {
        return $this->render('front/comment.html.twig', [
            'comment' => $comment,
        ]);
    }
}
