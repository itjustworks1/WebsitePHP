<?php

namespace App\Core;

class FileManager
{
    use \App\Traits\Helper;
    public string $dir;
    public  function __construct(string $dir = ARTICLES_DIR)
    {
        $this->dir = $dir;
    }

    public function listFiles(string $path = '')
    {
        $a = $this->dir . ltrim($path, '/');
        return array_filter(glob($a.'/*.md'), 'is_file');
    }
    public  function readFile(string $path = '')
    {
        $a = $this->dir . ltrim($path, '/');
        if (file_exists($a))
        {
            return file_get_contents($a);
        }
        return false;
    }
}