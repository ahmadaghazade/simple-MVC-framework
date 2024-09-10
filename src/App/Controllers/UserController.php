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
//        $data = ['name' => 'ahmad'];
        $view = new View();
        $view->render('admin.index');

//        $users = $this->userModel->getAllUsers();
//        if ($users)
//        {
////            var_dump($users);
//            foreach ($users as $user)
//            {
//                echo $user['name'];
//            }
//        }
    }

}