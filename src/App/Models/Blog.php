<?php

namespace App\App\Models;

use App\App\Core\Database;

class Blog
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()
                            ->getConnection();
    }

    public function getAllBlogs()
    {
        $stmt = $this->db->prepare("SELECT * FROM blogs");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findBlog($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM blogs WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateDb($data, $id)
    {
        $stmt = $this->db->prepare("UPDATE services 
            SET title = :title,
                icon_class = :icon_class,
                main_image = :main_image,
                main_content = :main_content,
                description = :description,
                created_at = :created_at 
            WHERE id = :id");
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':icon_class', $data['icon_class']);
        $stmt->bindParam(':main_image', $data['main_image']);
        $stmt->bindParam(':main_content', $data['main_content']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':created_at', $data['created_at']);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            echo "Update was successful!";
        } else {
            echo "Update failed!";
        }
        return $stmt->execute();

    }

}