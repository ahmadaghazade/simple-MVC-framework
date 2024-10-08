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
$router->add(
    'admin/dashboard/brand/edit/{id}', [
        'controller' => 'BrandController',
        'action'     => 'edit',
    ]
);
$router->add(
    'admin/dashboard/brand/update/{id}', [
        'controller' => 'BrandController',
        'action'     => 'update',
    ]
);
$router->add(
    'admin/dashboard/brand/delete/{id}', [
        'controller' => 'BrandController',
        'action'     => 'delete',
    ]
);

// services routes ####################################################
$router->add(
    'admin/dashboard/services', [
        'controller' => 'ServiceController',
        'action'     => 'index',
    ]
);
$router->add(
    'admin/dashboard/service/create', [
        'controller' => 'ServiceController',
        'action'     => 'create',
    ]
);
$router->add(
    'admin/dashboard/service/store', [
        'controller' => 'ServiceController',
        'action'     => 'store',
    ]
);
$router->add(
    'admin/dashboard/service/delete/{id}', [
        'controller' => 'ServiceController',
        'action'     => 'delete',
    ]
);
$router->add(
    'admin/dashboard/service/edit/{id}', [
        'controller' => 'ServiceController',
        'action'     => 'edit',
    ]
);
$router->add(
    'admin/dashboard/service/update/{id}', [
        'controller' => 'ServiceController',
        'action'     => 'update',
    ]
);

// home_page_content routes ####################################################
$router->add(
    'admin/dashboard/page_content', [
        'controller' => 'PageContentController',
        'action'     => 'index',
    ]
);
$router->add(
    'admin/dashboard/page_content/edit/{id}', [
        'controller' => 'PageContentController',
        'action'     => 'edit',
    ]
);
$router->add(
    'admin/dashboard/page_content/update/{id}', [
        'controller' => 'PageContentController',
        'action'     => 'update',
    ]
);
// blog routes ####################################################
$router->add(
    'admin/dashboard/blogs', [
        'controller' => 'BlogController',
        'action'     => 'index',
    ]
);
$router->add(
    'admin/dashboard/blog/create', [
        'controller' => 'BlogController',
        'action'     => 'create',
    ]
);
$router->add(
    'admin/dashboard/blog/store', [
        'controller' => 'BlogController',
        'action'     => 'store',
    ]
);
$router->add(
    'admin/dashboard/blog/edit/{id}', [
        'controller' => 'BlogController',
        'action'     => 'edit',
    ]
);
$router->add(
    'admin/dashboard/blog/update/{id}', [
        'controller' => 'BlogController',
        'action'     => 'update',
    ]
);
$router->add(
    'admin/dashboard/blog/delete/{id}', [
        'controller' => 'BlogController',
        'action'     => 'delete',
    ]
);






$url = trim($_SERVER['REQUEST_URI'], '/');
$router->dispatch($url);