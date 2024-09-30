<?php

namespace App\App\Models;

use App\App\Core\Database;

class PageContent
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()
                            ->getConnection();
    }

    public function getAllContents(): false|array
    {
        $stmt = $this->db->prepare("SELECT * FROM page_content");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findContent($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM page_content WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($data, $id): bool
    {
        $stmt = $this->db->prepare("UPDATE page_content 
            SET value = :value
            WHERE id = :id");
        $stmt->bindParam(':value', $data['value']);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            echo "Update was successful!";
        } else {
            echo "Update failed!";
        }
        return $stmt->execute();

    }

}