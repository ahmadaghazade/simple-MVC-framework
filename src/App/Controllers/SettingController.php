<?php

namespace App\App\Controllers;

use App\App\Core\View;
use App\App\Models\Setting;

class SettingController
{
    private $settingModel;

    public function __construct()
    {
        $this->settingModel = new Setting();
    }

    public function index()
    {
        $settings = $this->settingModel->getAllSettings();
        $view     = new View(['settings' => $settings]);
        $view->render('admin.setting');
    }

    public function edit()
    {
        $settings = $this->settingModel->getAllSettings();
        $view     = new View(['settings' => $settings]);
        $view->render('admin.editsetting');
    }

    public function create(): void
    {
        $data   = [
            'address'        => $_POST['address'] ?? '',
            'email_address'  => $_POST['email_address'] ?? '',
            'facebook_link'  => $_POST['facebook_link'] ?? '',
            'x_link'         => $_POST['x_link'] ?? '',
            'instagram_link' => $_POST['instagram_link'] ?? '',
            'pinterest_link' => $_POST['pinterest_link'] ?? '',
            'phone'          => $_POST['phone'] ?? '',
        ];
        $errors = $this->validate($data);
        if (empty($errors)){
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->settingModel->update($data);
            echo 'settings saved successfully';
        }
        else
        {
            echo "Validation errors occurred:";
            foreach ($errors as $error) {
                echo "<p>$error</p>";
            }
        }
    }

    private function validate($data): array
    {
        $errors = [];

        if (empty($data['address'])) {
            $errors[] = "Address is required.";
        }

        if (!filter_var($data['email_address'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email address.";
        }

        if (!filter_var($data['facebook_link'], FILTER_VALIDATE_URL)) {
            $errors[] = "Invalid Facebook URL.";
        }

        if (!filter_var($data['x_link'], FILTER_VALIDATE_URL)) {
            $errors[] = "Invalid X (Twitter) URL.";
        }

        if (!filter_var($data['instagram_link'], FILTER_VALIDATE_URL)) {
            $errors[] = "Invalid Instagram URL.";
        }

        if (!filter_var($data['pinterest_link'], FILTER_VALIDATE_URL)) {
            $errors[] = "Invalid Pinterest URL.";
        }

        if (empty($data['phone'])) {
            $errors[] = "Phone number is required.";
        }

        return $errors;
    }
}