<?php

namespace App\Interfaces;

use App\Models\Article;
interface PostFactoryInterface
{
    public function create(array $data): Article;
}