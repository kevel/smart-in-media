<?php

namespace SmartMedia\Api\Router;

class Router
{
    protected $prefix = null;

    /* @var $routes Route[] */
    protected $routes = [];

    public function setPrefix(string $prefix)
    {
        $this->prefix = $prefix;
    }

    public function get(string $pattern, callable $callback)
    {
        $this->routes[] = new Route(
            Route::REQUEST_METHOD_GET,
            $pattern,
            $callback
        );
    }

    public function match()
    {
        foreach ($this->routes as $route) {
            if ($_SERVER['REQUEST_METHOD'] !== $route->getRequestMethod()) {
                continue;
            }

            if (!preg_match($this->getPatternRegex($route->getPattern()), $_SERVER['REQUEST_URI'], $matches)) {
                continue;
            }

            $route->getCallback()();
        }
    }

    protected function getPatternRegex(string $pattern)
    {
        return sprintf('/%s/', preg_quote($pattern, '/'));
    }
}
