<?php

namespace App\Routing;

use Twig\Environment;

class Router
{

    public function __construct(private Environment $twig)
    {
    }

    private array $routes = [];

    public function addRoute(
        string $name,
        string $url,
        string $httpMethod,
        string $controllerClass,
        string $controllerMethod
    ) {
        $this->routes[] = [
            'name' => $name,
            'url' => $url,
            'httpMethod' => $httpMethod,
            'controllerClass' => $controllerClass,
            'controllerMethod' => $controllerMethod
        ];
    }

    public function getRoute(string $uri, string $httpMethod)
    {
        foreach ($this->routes as $key => $route) {
            if ($route['url'] === $uri && $route['httpMethod'] === $httpMethod) {
                return $route;
            }
        }

        return null;
    }

    public function execute(string $requestUri, string $httpMethod)
    {
        $route = $this->getRoute($requestUri, $httpMethod);

        if ($route === null) {
            throw new RouteNotFoundException($requestUri, $httpMethod);
        }

        $controller = $route['controllerClass'];
        $method = $route['controllerMethod'];
        $controllerInstance = new $controller($this->twig);
        $controllerInstance->$method();
    }
}
