<?php

namespace App\Interfaces;

use App\Models\Article;
interface PostRepositoryInterface
{
    public function all(): array;
    public function find(int $id): ?Article;
    public function create(array $data): Article;
    public function update(int $id, array $data): ?Article;
    public function delete(int $id): bool;
}