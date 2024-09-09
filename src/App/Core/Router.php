<?php

namespace App\App\Core;
class Router {
    protected array $routes = [];

    public function add($route, $params = []): void
    {
        $route = preg_replace('/\//', '\\/', $route);
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[0-9]+)', $route);
        $route = '/^' . $route . '$/i';
        $this->routes[$route] = $params;
    }

    public function match($url) {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                return $params;
            }
        }
        return false;
    }

    public function dispatch($url): void
    {
        $url = $this->removeQueryString($url);

        if ($params = $this->match($url)){
            $controller = $this->getNamespace() . $params['controller'];
            $controllerObject = new $controller();
            $action = $params['action'];
            if (method_exists($controllerObject, $action)) {
                unset($params['controller'], $params['action']);
                call_user_func_array([$controllerObject, $action], $params);
            } else {
                echo "Action {$action} not found";
            }
        }
        else {
            echo "Error 404 . Not Found";
        }
    }

    private function removeQueryString($url) {
        if ($url != '') {
            $parts = explode('&', $url, 2);
            if (strpos($parts[0], '=') === false) {
                return rtrim($parts[0], '/');
            }
        }
        return '';
    }

    private function getNamespace() {
        return 'App\App\Controllers\\';
    }

}