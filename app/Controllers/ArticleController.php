<?php

namespace App\Controllers;

use App\Interfaces\PostRepositoryInterface;
use Michelf\Markdown;
use App\Core\FileManager;
use App\Traits\Helper;
use App\Views\ArticleView;
use App\Models\Article;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ArticleController
{
    use Helper;
//    public Article $article;
    public ArticleView $articleView;
    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $repository, ArticleView $articleView
//        ,Article $article
    )
    {
        $this->postRepository = $repository;
        $this->articleView = $articleView;
//        $this->article = $article;

    }

    public function showArticlesList(): ResponseInterface
    {
        $articles = $this->postRepository->all();
        $html = $this->articleView->showArticlesList( $articles);
        return $this->responseWrapper($html);


//        $file_manager = new FileManager();
//        $articles_paths = $file_manager->listFiles($path, $file_manager);
//        $articles = [];
//        foreach ($articles_paths as $articles_path) {
//            $path = basename($articles_path);
//            $articles[] = $this->article->getArticle($path, $file_manager);
////            $articles[] = Markdown::defaultTransform($path);
//        }
//
//        $path = $_SERVER['DOCUMENT_ROOT'] . '/../templates/articles/articles_list.php';
//        $this->articleView->showArticlesList($path, $articles);
    }

    public function responseWrapper(string $str):ResponseInterface
    {
        $response = new Response();
        $response->getBody()->write($str);
        return $response;

    }

    public function article(ServerRequestInterface $request, array $args): ResponseInterface
    {
        $id = (int)$args['id'];
        $article = $this->postRepository->find($id);
        if (!$article) {
            $html = $this->articleView->error404();
            return $this->responseWrapper($html);
        }
        $html = $this->articleView->showSingleArticle($article);
        return $this->responseWrapper($html);


//        $post = $this->postRepository->find($request->getAttribute('id'));
//        $html = $this->articleView->showSingleArticle($post);
//        return $this->responseWrapper($html);
    }
//    public function calc(ServerRequestInterface $request):ResponseInterface
//    {
//        $response = new Response();
//        $response->getBody()->write($str);
//        return $response;
//    }

} 