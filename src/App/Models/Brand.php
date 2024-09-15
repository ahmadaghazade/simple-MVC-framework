<?php

namespace App\App\Models;

use App\App\Core\Database;

class Brand
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()
                            ->getConnection();
    }

    public function insertBrand($data)
    {

    }
    public function updateBrand($data, $id)
    {

    }
    public function deleteBrand($id)
    {

    }

    public function getAllBrands()
    {
        $stmt = $this->db->prepare("SELECT * FROM brands");
        $stmt->execute();
        return $stmt->fetchAll();
    }

}