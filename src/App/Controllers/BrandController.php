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

    public function edit($id)
    {
        $brand = $this->brandModel->findBrand($id);
        $view = new View(['brand' => $brand]);
        $view->render('admin.edit_brand');
    }

    public function update($id)
    {
        $brand = $this->brandModel->findBrand($id);
        $parsedUrl = parse_url($brand['image_url'], PHP_URL_PATH); // This gives "/uploads/brands/brand_img03.png"
        $filePath = $_SERVER['DOCUMENT_ROOT'] . $parsedUrl;
        if (file_exists($filePath) && $brand){
            unlink($filePath);
        }
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
            $fileTmpPath = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $allowedFileTypes = ['jpg', 'jpeg', 'png', 'gif'];
            if (in_array($fileExtension, $allowedFileTypes))
            {
                $uploadFileDirection = __DIR__ . '/../../../uploads/brands/';
                $destinationPath = $uploadFileDirection . $fileName;
                $realFilePath = getBaseUrl() . 'uploads/brands/' . $fileName;
                if (move_uploaded_file($fileTmpPath, $destinationPath)) {
                    $this->updateFile($id,$realFilePath);
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

                $uploadFileDirection = __DIR__ . '/../../../uploads/brands/';
//                dd($uploadFileDirection);
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

    public function delete($id)
    {
        $stmt = $this->db->prepare("SELECT image_url FROM brands WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $brand = $stmt->fetch();
        if ($brand && $brand['image_url']){
            $parsedUrl = parse_url($brand['image_url'], PHP_URL_PATH); // This gives "/uploads/brands/brand_img03.png"
            $filePath = $_SERVER['DOCUMENT_ROOT'] . $parsedUrl;
            if (file_exists($filePath)){
                unlink($filePath);
            }
        }
        $stmt = $this->db->prepare("DELETE FROM brands WHERE id = :id");
        $stmt->bindParam(':id', $id);
        if ($stmt->execute())
        {
            echo "Brand with ID $id and associated file have been deleted successfully.";
            header('Location: /admin/dashboard/brands'); // Redirect to the brands list after deletion
            exit();
        } else {
            echo "Error deleting brand.";
        }
    }

    public function insertFileIntoDb($imagePath)
    {
        $stmt = $this->db->prepare("INSERT INTO brands (image_url) VALUES (:image_path)");
        $stmt->bindParam(':image_path', $imagePath);
        return $stmt->execute();
    }
    public function updateFile($id,$imagePath)
    {
        $stmt = $this->db->prepare("UPDATE brands SET image_url = :image_url WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':image_url', $imagePath);
        return $stmt->execute();
    }


}