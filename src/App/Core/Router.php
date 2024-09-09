<?php

namespace App\App\Core;
class Router {
    protected array $routes = [];

    public function add($routes, $params = []): void
    {
        $this->routes[$routes] = $params;
    }

    public function dispatch($url): void
    {
        if (array_key_exists($url, $this->routes))
        {
            $controllerName = $this->routes[$url]['controller'];
            $actionName = $this->routes[$url]['action'];

            $controller = "App\\App\\Controllers\\$controllerName";
            if (class_exists($controller))
            {
                $controllerObject = new $controller();
                if (method_exists($controllerObject, $actionName))
                {

                    print_r($controllerObject->$actionName());
                }
                else
                {
                    echo "Action $actionName not found in controllers $controllerName .";
                }
            }
            else
            {
                echo "Controller $controllerName not found.";
            }
        }
        else
        {
            echo "Error 404";
        }
    }

}