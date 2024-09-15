<?php

// Admin Routes
$router->add(
    'admin/dashboard', [
        'controller' => 'AdminController',
        'action'     => 'index',
    ]
);

// site setting routes ##############################################
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

// brand routes ####################################################
$router->add(
    'admin/dashboard/brands', [
        'controller' => 'BrandController',
        'action'     => 'index',
    ]
);
$router->add(
    'admin/dashboard/brand/create', [
        'controller' => 'BrandController',
        'action'     => 'create',
    ]
);
$router->add(
    'admin/dashboard/brand/store', [
        'controller' => 'BrandController',
        'action'     => 'store',
    ]
);




$url = trim($_SERVER['REQUEST_URI'], '/');
$router->dispatch($url);