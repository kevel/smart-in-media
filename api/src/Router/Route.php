<?php

namespace SmartMedia\Api\Router;

class Route
{
    const REQUEST_METHOD_GET = 'GET';
    const REQUEST_METHOD_POST = 'POST';

    protected $method = null;
    protected $pattern = null;
    protected $callback = null;

    public function __construct(string $method, string $pattern, callable $callback)
    {
        $this->method = $method;
        $this->pattern = $pattern;
        $this->callback = $callback;
    }

    public function getRequestMethod()
    {
        return $this->method;
    }

    public function getPattern()
    {
        return $this->pattern;
    }

    public function getCallback()
    {
        return $this->callback;
    }
}
