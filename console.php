<?php

// Make sure this script only runs from the command line
if (php_sapi_name() != "cli") {
    exit("This script can only be run from the command line.");
}

$arguments = $argv;

// Check if the right number of arguments are provided
if (count($arguments) < 3) {
    exit("Usage: php console.php make:controller <ControllerName>\n");
}

// Extract the command and name
$command = $arguments[1];
$name = $arguments[2];

// Handle the command
if ($command === 'make:controller') {
    createController($name);
} else {
    exit("Unknown command: $command\n");
}

// Function to create a controller
function createController($name)
{
    // Define the directory where the controller should be created
    $controllerDir = __DIR__ . '/src/App/Controllers/';

    // Make sure the directory exists
    if (!is_dir($controllerDir)) {
        mkdir($controllerDir, 0755, true);
    }

    // Define the controller file path
    $filePath = $controllerDir . $name . 'Controller.php';

    // Check if the controller already exists
    if (file_exists($filePath)) {
        exit("Controller $name already exists!\n");
    }

    // Create the controller template
    $controllerTemplate = <<<PHP
<?php

namespace App\Controllers;

class {$name}Controller
{
    public function index()
    {
        // Controller logic here
        echo "This is the {$name} controller!";
    }
}
PHP;

    // Write the file
    file_put_contents($filePath, $controllerTemplate);

    echo "Controller {$name} created successfully at {$filePath}\n";
}