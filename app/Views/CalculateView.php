<?php

namespace App\Views;

use App\Traits\Helper;
use Twig\Environment;

class CalculateView
{
    private $twig;
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }
    use Helper;
    public function result(string  $result, string $history): string
    {
        return $this->twig->render('front/pages/calculate.html.twig', ["result" => $result, "history" => $history]);
    }
}