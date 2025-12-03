<?php

namespace App\Views;

use App\Models\Article;
use App\Traits\Helper;
use Twig\Environment;

class ArticleView
{
    private  $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig ;
    }
    use Helper;
//    protected $html;

    public function showHomePage(): string
    {
        return $this->twig->render('/cucumber/pages/index.html.twig');

    }
    public function showArticlesList(array $articles): string
    {
        return $this->twig->render('/cucumber/pages/articles.html.twig', ['articles' => $articles]);

    }
    public function showSingleArticle(Article $article):string
    {
       // extract($article);
        //print $this->html = include_once($path);
        return $this->twig->render('/cucumber/pages/article.html.twig', ['article' => $article]);

    }
    public function error404():string
    {
        return $this->twig->render('front/pages/page-404.html.twig');
    }
}