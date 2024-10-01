<?php

namespace App\App\Controllers;

use App\App\Core\View;
use App\App\Models\Blog;
use App\App\Core\Database;

class BlogController
{
    private $BlogModel;
    private $db;

    public function __construct()
    {
        $this->BlogModel = new Blog();
        $this->db = Database::getInstance()->getConnection();
    }

    public function index(): void
    {
        $blogs = $this->BlogModel->getAllBlogs();
        $view   = new View(['blogs' => $blogs]);
        $view->render('admin.blog');
    }

    public function edit($id)
    {
        $blog = $this->BlogModel->findBlog($id);
        $view = new View(['blog' => $blog]);
        $view->render('admin.edit_blog');
    }

    public function update($id)
    {
        $service = $this->serviceModel->findService($id);// finding the service
        $data    = requestedData();
        if (isset($_FILES['main_image']) && $_FILES['main_image']['error'] === UPLOAD_ERR_OK) {
            // finding the previus image and delete it
            $parsedUrl = parse_url($service['main_image'], PHP_URL_PATH); // This gives "/uploads/brands/brand_img03.png"
            $filePath  = $_SERVER['DOCUMENT_ROOT'] . $parsedUrl;
            if (file_exists($filePath) && $service) {
                unlink($filePath);
            }
//            inserting the new image
            $fileTmpPath      = $_FILES['main_image']['tmp_name'];
            $fileName         = $_FILES['main_image']['name'];
            $fileNameCmps     = explode(".", $fileName);
            $fileExtension    = strtolower(end($fileNameCmps));
            $allowedFileTypes = ['jpg', 'jpeg', 'png', 'gif'];
            if (in_array($fileExtension, $allowedFileTypes)) {
                $uploadFileDirection = __DIR__ . '/../../../public/uploads/services/';
                $destinationPath     = $uploadFileDirection . $fileName;
                $realFilePath        = getBaseUrl() . 'uploads/services/' . $fileName;
                $data['main_image']  = $realFilePath;
                if (move_uploaded_file($fileTmpPath, $destinationPath)) {
                    $this->updateFile($id, $realFilePath);
                    echo "File is successfully uploaded.";
                    // You can store the file path in the database if needed
                    // $this->saveImagePathToDatabase($dest_path);
                } else {
                    echo "There was an error moving the uploaded file.";
                }

            } else {
                echo "Upload failed. Allowed file types: " . implode(", ", $allowedFileTypes);
            }

        }
        $update = $this->serviceModel->updateDb($data, $id);
        if ($update) {
            echo "update was successful";
        }
        else {
            echo "there was an error while updating";
        }
    }

    public function create(): void
    {
        $view = new View();
        $view->render('admin.create_blog');
    }

    public function store(): void
    {
//        not clean code; need to refactor in another time.
        if (isset($_FILES['main_image']) && $_FILES['main_image']['error'] === UPLOAD_ERR_OK){
            $fileTmpPath = $_FILES['main_image']['tmp_name'];
            $fileName = $_FILES['main_image']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $allowedFileTypes = ['jpg', 'jpeg', 'png', 'gif'];
            if (in_array($fileExtension, $allowedFileTypes))
            {
                $uploadFileDirection = __DIR__ . '/../../../public/uploads/blogs/';
                $destinationPath = $uploadFileDirection . $fileName;
                $realFilePath = getBaseUrl() . 'uploads/blogs/' . $fileName;
                if (move_uploaded_file($fileTmpPath, $destinationPath)) {
                    $requestedData = requestedData();
                    $requestedData["main_image"] = $realFilePath;
                    $insert = $this->insertToDb($requestedData);
                    if ($insert === true)
                    {
                        echo "File is successfully uploaded.";
                        // You can store the file path in the database if needed
                        // $this->saveImagePathToDatabase($dest_path);
                        header('Location: /admin/dashboard/blogs');
                    }

                } else {
                    echo "There was an error moving the uploaded file.";
                }
            } else {
                echo "Upload failed. Allowed file types: " . implode(", ", $allowedFileTypes);
            }
        } else {
            echo "There was an error with the file upload.";
        }

    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM blogs WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $blog = $stmt->fetch();
        if ($blog && $blog['main_image']){
            $parsedUrl = parse_url($blog['main_image'], PHP_URL_PATH); // This gives "/uploads/brands/brand_img03.png"
            $filePath = $_SERVER['DOCUMENT_ROOT'] . $parsedUrl;
            if (file_exists($filePath)){
                unlink($filePath);
            }
        }
        $stmt = $this->db->prepare("DELETE FROM blogs WHERE id = :id");
        $stmt->bindParam(':id', $id);
        if ($stmt->execute())
        {
            echo "Service with ID $id and associated file have been deleted successfully.";
            header('Location: /admin/dashboard/blogs'); // Redirect to the brands list after deletion
            exit();
        } else {
            echo "Error deleting service.";
        }
    }

    public function insertToDb($data)
    {
        $stmt = $this->db->prepare("INSERT INTO blogs (title, main_image, writer, tags, description) VALUES (:title, :main_image, :writer, :tags, :description)");
        try {
            $stmt->bindParam(':title', $data['title']);
            $stmt->bindParam(':main_image', $data['main_image']);
            $stmt->bindParam(':writer', $data['writer']);
            $stmt->bindParam(':tags', $data['tags']);
            $stmt->bindParam(':description', $data['description']);
            return $stmt->execute();
        }
        catch (\Exception $e)
        {
            dd($e);

        }

    }

    public function updateFile($id,$imagePath)
    {
        $stmt = $this->db->prepare("UPDATE services SET main_image = :main_image WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':main_image', $imagePath);
        return $stmt->execute();
    }


}