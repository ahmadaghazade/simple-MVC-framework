<?php

namespace App\App\Models;

use App\App\Core\Database;

class Setting
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()
                            ->getConnection();
    }

    public function getAllSettings()
    {
        $stmt = $this->db->prepare("SELECT * FROM settings");
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($data)
    {
        $stmt = $this->db->prepare(
            "UPDATE settings SET
                    address = :address,
                    email_address = :email_address,
                    facebook_link = :facebook_link,
                    x_link = :x_link,
                    instagram_link = :instagram_link,
                    pinterest_link = :pinterest_link,
                    phone = :phone,
                    created_at = :created_at
                    WHERE id = 1"
        );
        $stmt->bindParam(':address', $data['address']);
        $stmt->bindParam(':email_address', $data['email_address']);
        $stmt->bindParam(':facebook_link', $data['facebook_link']);
        $stmt->bindParam(':x_link', $data['x_link']);
        $stmt->bindParam(':instagram_link', $data['instagram_link']);
        $stmt->bindParam(':pinterest_link', $data['pinterest_link']);
        $stmt->bindParam(':phone', $data['phone']);
        $stmt->bindParam(':created_at', $data['created_at']);
        $stmt->execute();
    }
}