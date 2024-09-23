<?php

require __DIR__ . '/../vendor/autoload.php';

// Here the app requires the classes
use App\App\Core\Router;



// Here the object of a class will build
$router = new Router();




require_once '../routes/web.php';


function dd($item)
{
    var_dump($item);
    die();
}

function getBaseUrl() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    $script = $_SERVER['SCRIPT_NAME'];

    // Remove the script part (e.g., "/index.php") to get the base directory
    $baseDir = str_replace(basename($script), "", $script);

    return $protocol . $host . $baseDir;
}

function request()
{
    dd($_POST);
}
function requestedData()
{
    return $_POST;
}