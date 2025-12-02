<?php

namespace App\Controllers;

use App\Interfaces\PostRepositoryInterface;
use App\Traits\Helper;
use App\Views\CalculateView;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CalculateController
{
    use Helper;
    private CalculateView $calculateView;
    public function __construct(CalculateView $calculateView)
    {
        $this->calculateView = $calculateView;
    }
    public function responseWrapper(string $str):ResponseInterface
    {
        $response = new Response();
        $response->getBody()->write($str);
        return $response;

    }
    public function showResult(ServerRequestInterface $request,array $args):ResponseInterface
    {
        $result = $args['result']|' ';
        $history = file_get_contents('content/calculator_history.txt');
        $html = $this->calculateView->result($result, $history);
        return $this->responseWrapper($html);
    }

}