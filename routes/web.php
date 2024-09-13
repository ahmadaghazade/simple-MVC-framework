<?php

// Admin Routes
$router->add(
    'admin/dashboard', [
        'controller' => 'AdminController',
        'action'     => 'index',
    ]
);
$router->add(
    'admin/dashboard/site-settings', [
        'controller' => 'SettingController',
        'action'     => 'index',
    ]
);
$router->add(
    'admin/dashboard/site-settings/edit', [
        'controller' => 'SettingController',
        'action'     => 'edit',
    ]
);
$router->add(
    'admin/dashboard/site-settings/create', [
        'controller' => 'SettingController',
        'action'     => 'create',
    ]
);




$url = trim($_SERVER['REQUEST_URI'], '/');
$router->dispatch($url);