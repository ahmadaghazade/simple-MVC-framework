<?php

namespace App\App\Models;

use App\App\Core\Database;
class User
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getUserById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM USERS WHERE id= :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function getAllUsers()
    {

        $stmt = $this->db->prepare("SELECT * FROM USERS");
        return $stmt->execute();
    }
}