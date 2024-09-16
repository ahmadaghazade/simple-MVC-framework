<?php

namespace App\App\Models;

use App\App\Core\Database;

class Service
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()
                            ->getConnection();
    }

    public function getAllServices()
    {
        $stmt = $this->db->prepare("SELECT * FROM services");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findBrand($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM brands WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

}