<?php

namespace App\App\Controllers;

use App\App\Models\User;

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
        if ($user)
        {
            echo $user;
        }
    }

    public function all()
    {
        return $this->userModel->getAllUsers();
    }

}