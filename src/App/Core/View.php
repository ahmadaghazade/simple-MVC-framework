<?php

namespace App\App\Core;

class View
{
    protected $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function render(string $viewFile): void
    {
        $filePath = __DIR__ . '/../../views/'.$viewFile . '.php';
        if (file_exists($filePath)){
            extract($this->data);
            include $filePath;
        }
        else {
            echo "view file not found";
        }
    }
}