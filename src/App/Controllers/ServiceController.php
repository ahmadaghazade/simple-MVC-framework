<?php

namespace App\App\Controllers;

use App\App\Core\View;
use App\App\Models\Service;
use App\App\Core\Database;

class ServiceController
{
    private $serviceModel;
    private $db;

    public function __construct()
    {
        $this->serviceModel = new Service();
        $this->db = Database::getInstance()->getConnection();
    }

    public function index()
    {
        $services = $this->serviceModel->getAllServices();
        $view   = new View(['services' => $services]);
        $view->render('admin.service');
    }

    public function edit($id)
    {
        $service = $this->serviceModel->findService($id);
        $view = new View(['service' => $service]);
        $view->render('admin.edit_service');
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
        $view->render('admin.create_service');
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
                $uploadFileDirection = __DIR__ . '/../../../public/uploads/services/';
                $destinationPath = $uploadFileDirection . $fileName;
                $realFilePath = getBaseUrl() . 'uploads/services/' . $fileName;
                if (move_uploaded_file($fileTmpPath, $destinationPath)) {
                    $requestedData = requestedData();
                    $requestedData["main_image"] = $realFilePath;
                    $insert = $this->insertToDb($requestedData);
                    if ($insert === true)
                    {
                        echo "File is successfully uploaded.";
                        // You can store the file path in the database if needed
                        // $this->saveImagePathToDatabase($dest_path);
                        header('Location: /admin/dashboard/services');
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
        $stmt = $this->db->prepare("SELECT main_image FROM services WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $service = $stmt->fetch();
        if ($service && $service['main_image']){
            $parsedUrl = parse_url($service['main_image'], PHP_URL_PATH); // This gives "/uploads/brands/brand_img03.png"
            $filePath = $_SERVER['DOCUMENT_ROOT'] . $parsedUrl;
            if (file_exists($filePath)){
                unlink($filePath);
            }
        }
        $stmt = $this->db->prepare("DELETE FROM services WHERE id = :id");
        $stmt->bindParam(':id', $id);
        if ($stmt->execute())
        {
            echo "Service with ID $id and associated file have been deleted successfully.";
            header('Location: /admin/dashboard/services'); // Redirect to the brands list after deletion
            exit();
        } else {
            echo "Error deleting service.";
        }
    }

    public function insertToDb($data)
    {
        $stmt = $this->db->prepare("INSERT INTO services (title, icon_class, main_image, main_content, description, created_at) VALUES (:title, :icon_class, :main_image, :main_content, :description, :created_at)");
        try {
            $stmt->bindParam(':title', $data['title']);
            $stmt->bindParam(':icon_class', $data['icon_class']);
            $stmt->bindParam(':main_image', $data['main_image']);
            $stmt->bindParam(':main_content', $data['main_content']);
            $stmt->bindParam(':description', $data['description']);
            $stmt->bindParam(':created_at', $data['created_at']);
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