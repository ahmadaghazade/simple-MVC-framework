<?php

// Admin Routes
$router->add(
    'admin/dashboard', [
        'controller' => 'AdminController',
        'action'     => 'index',
    ]
);


$url = trim($_SERVER['REQUEST_URI'], '/');
$router->dispatch($url);