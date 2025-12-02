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

    public function showArticlesList(array $articles): string
    {
        return $this->twig->render('front/pages/articles.html.twig', ['articles' => $articles]);


//        $data = '';
//        $dataS = '';
//        foreach ($articles as $article) {
//            $meta = $article['json'];
//            $data .= '<div id="'.$meta['title'].'"><h2>'.$meta['title'].'</h2></div>
//                <div>'.$meta['intro-text'].'</div>
//                <div><img src="'.$meta['intro-image'].'"></div>';
//            $dataS .= '<li><a href="#'.$meta['title'].'">'.$meta['title'].'</a></li>';
//        }
//        print $this->html = include_once($path);
    }
    public function showSingleArticle(Article $article):string
    {
       // extract($article);
        //print $this->html = include_once($path);
        return $this->twig->render('front/pages/article.html.twig', ['article' => $article]);

    }
    public function error404():string
    {
        return $this->twig->render('front/pages/page-404.html.twig');
    }
}