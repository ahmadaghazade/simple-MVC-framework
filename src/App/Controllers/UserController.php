<?php

namespace App\App\Controllers;

use App\App\Models\User;
use App\App\Core\View;

class UserController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new User();
    }

    public function show($id)
    {
        $user = $this->userModel->getUserById($id);
        var_dump($user);
    }

    public function all()
    {
        $view = new View();
        $view->render('admin.index');
    }

}