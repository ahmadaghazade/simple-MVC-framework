<?php

namespace App\App\Controllers;

use App\App\Core\View;
use App\App\Models\Brand;
use App\App\Core\Database;

class BrandController
{
    private $brandModel;
    private $db;

    public function __construct()
    {
        $this->brandModel = new Brand();
        $this->db = Database::getInstance()->getConnection();
    }

    public function index()
    {
        $brands = $this->brandModel->getAllBrands();
        $view   = new View(['brands' => $brands]);
        $view->render('admin.brand');
    }

    public function edit()
    {
        $settings = $this->settingModel->getAllSettings();
        $view     = new View(['settings' => $settings]);
        $view->render('admin.editsetting');
    }

    public function create(): void
    {
        $view = new View();
        $view->render('admin.create_brand');
    }

    public function store(): void
    {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
            $fileTmpPath = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $allowedFileTypes = ['jpg', 'jpeg', 'png', 'gif'];
            if (in_array($fileExtension, $allowedFileTypes))
            {

                $uploadFileDirection = __DIR__ . '/../../../public/uploads/brands/';
                $destinationPath = $uploadFileDirection . $fileName;
                $realFilePath = getBaseUrl() . 'uploads/brands/' . $fileName;
                if (move_uploaded_file($fileTmpPath, $destinationPath)) {
                    $this->insertFileIntoDb($realFilePath);
                    echo "File is successfully uploaded.";
                    // You can store the file path in the database if needed
                    // $this->saveImagePathToDatabase($dest_path);
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

    public function insertFileIntoDb($imagePath)
    {
        $stmt = $this->db->prepare("INSERT INTO brands (image_url) VALUES (:image_path)");
        $stmt->bindParam(':image_path', $imagePath);
        return $stmt->execute();

    }


}