<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @Route("/article", name="article")
     */
    public function index(ArticleRepository $articleRepository)
    {
        $articles = $articleRepository->findAll();
        return $this->render("article/index.html.twig",[
            'article' => $articles
        ]);

    }

    /**
     * @Route("/article/{article}", name="article_show")
     */

    public function show(Article $article){
        $this->denyAccessUnlessGranted("read_article", $article);
        /*
        $user = $this->getUser();
        if ($user !== $article->getAuthor()) {
           throw $this->createAccessDeniedException();

        }
        */
        return $this->render("articles/show.html.twig", [
            'article' => $article
        ]);
    }
}
