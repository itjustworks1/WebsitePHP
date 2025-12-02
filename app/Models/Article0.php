<?php
//
//namespace App\Models;
//use App\Core\FileManager;
//use App\Interfaces\PostRepositoryInterface;
//use App\Traits\Helper;
//
//class Article implements PostRepositoryInterface
//{
//    use Helper;
//    public array $articles;
//
//    public function __construct()
//    {
//        $this->articles = [
//            [
//                'title' => 'Title 1',
//                'content' => 'Content 1'
//            ],
//            [
//                'title' => 'Title 2',
//                'content' => 'Content 2'
//            ],
//            [
//                'title' => 'Title 3',
//                'content' => 'Content 3'
//            ]
//        ];
//    }
//
//
//    public function all(): array
//    {
//        // TODO: Implement all() method.
//        return $this->articles;
//    }
//
//    public function find(int $id): ?Post
//    {
//        // TODO: Implement find() method.
//        return $this->articles[$id];
//    }
//
//    public function create(array $data): Post
//    {
//        // TODO: Implement create() method.
//        return $this->articles[array_rand($this->articles)];
//    }
//
//    public function update(int $id, array $data): ?Post
//    {
//        // TODO: Implement update() method.
//        return $this->articles[$id];
//    }
//
//    public function delete(int $id): bool
//    {
//        // TODO: Implement delete() method.
//        return $this->articles[$id];
//    }
////
////    public function all()
////    {
////        return $this->articles;
////    }
////    public function getArticle(string $path, FileManager $fileManager)
////    {
////        $content = $fileManager->readFile($path);
////        if ($content != false)
////        {
////            $parts = explode("\n---\n", $content, 2);
////            $parts1 = json_decode($parts[0], true);
////            $parts2 = $parts[1];
////            return ['json' => $parts1, 'content' => $parts2];
////        }
////        return false;
////    }
//}