<?php

require __DIR__ . '/../vendor/autoload.php';

// Here the app requires the classes
use App\App\Core\Router;



// Here the object of a class will build
$router = new Router();




require_once '../routes/web.php';





function dd($item)
{
    print_r($item);
    die();
}