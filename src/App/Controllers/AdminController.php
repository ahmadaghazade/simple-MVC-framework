<?php

namespace App\App\Controllers;

use App\App\Core\View;

class AdminController
{
    public function index()
    {
        $view = new View();
        $view->render('admin.index');
    }
}