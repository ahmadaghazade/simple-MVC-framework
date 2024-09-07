<?php

$router->add('home', ['controller' => 'UserController', 'action' => 'all']);
//$router->add('about', ['controller' => 'AboutController', 'action' => 'index']);
//$router->add('posts/show', ['controller' => 'PostController', 'action' => 'show']);


$url = trim($_SERVER['REQUEST_URI'], '/');
$router->dispatch($url);