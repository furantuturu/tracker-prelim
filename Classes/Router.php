<?php

namespace Classes;

use Classes\Middleware\MiddlewareResolver;
class Router {
    private array $routes;
    public function add(string $uri, string $controller, string $method) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }
    public function get(string $uri, string $controller) {
        return $this->add($uri, $controller, 'GET');
    }
    public function post(string $uri, string $controller) {
        return $this->add($uri, $controller, 'POST');
    }
    public function put(string $uri, string $controller) {
        return $this->add($uri, $controller, 'PUT');
    }
    public function delete(string $uri, string $controller) {
        return $this->add($uri, $controller, 'DELETE');
    }
    public function only(string $key) {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        
        return $this;
    }
    public function route(string $uri, string $method) {
        foreach($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                MiddlewareResolver::resolve($route['middleware']);
                return require ROOT . 'controllers/' . $route['controller'];
            }
        }

        $this->abort();
    }
    public function abort(int $httpCode = 404) {
        http_response_code($httpCode);
        require_once ROOT . "views/{$httpCode}.view.php";
        die();
    }
}