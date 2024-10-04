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
        $stmt = $this->db->prepare("UPDATE blogs
            SET main_image = :main_image,
                title = :title,
                writer = :writer,
                tags = :tags,
                description = :description
            WHERE id = :id");
        $stmt->bindParam(':main_image', $data['main_image']);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':writer', $data['writer']);
        $stmt->bindParam(':tags', $data['tags']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            echo "Update was successful!";
        } else {
            echo "Update failed!";
        }
        return $stmt->execute();

    }

}