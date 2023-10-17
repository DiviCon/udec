<?php

class Core
{
    protected $routes = [];

    public function __construct()
    {
        $this->routes = include '../app/config/routes.php';

        $url = $this->_getUrl();
        $urlParts = explode('/', $url);

        $routeInfo = $this->_findMatchingRoute($url, $urlParts);
        
        if ($routeInfo !== null) {
            $controllerName = $routeInfo['controller'];
            $methodName = $routeInfo['method'];
            
            $controllerFilePath = '../app/controllers/' . $controllerName . '.php';

            if (file_exists($controllerFilePath)) {
                require_once $controllerFilePath;

                if (class_exists($controllerName)) {
                    $controller = new $controllerName();

                    // Llamamos al método del controlador pasando los parámetros
                    call_user_func_array([$controller, $methodName], $routeInfo['params']);
                } else {
                    throw new Exception("Controlador no encontrado: $controllerName");
                }
            } else {
                throw new Exception("Archivo de controlador no encontrado: $controllerFilePath");
            }
        } else {
            $this->handleNotFound();
        }
    }

    private function _findMatchingRoute($url, $urlParts)
    {
        foreach ($this->routes as $route => $routeConfig) {
            $routeParts = explode('/', $route);

            if (count($routeParts) === count($urlParts)) {
                $match = true;
                $params = [];

                foreach ($routeParts as $key => $part) {
                    if (strpos($part, '{') !== false) {
                        $paramName = trim($part, '{}');
                        $params[$paramName] = $urlParts[$key];
                    } elseif ($part !== $urlParts[$key]) {
                        $match = false;
                        break;
                    }
                }

                if ($match) {
                    $routeConfig['params'] = $params;
                    return $routeConfig;
                }
            }
        }

        return null;
    }

    private function _getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = str_replace('-', '_', $url);
            return $url;
        }
        return '/';
    }

    public function handleNotFound()
    {
        header("HTTP/1.0 404 Not Found");
        echo "Página no encontrada";
    }
}
