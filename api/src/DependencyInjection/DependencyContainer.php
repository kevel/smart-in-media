<?php
namespace SmartMedia\Api\DependencyInjection;

use Psr\Container\ContainerInterface;

class DependencyContainer implements ContainerInterface
{
    protected $services = [];
    protected $defenitions = [];

    public function get(string $id)
    {
        if ($this->has($id)) {
            return $this->services[$id];
        }

        return $this->resolve($id);
    }

    public function define(string $id, $callback)
    {
        $this->defenitions[$id] = $callback;
    }

    public function has(string $id): bool
    {
        return isset($this->services[$id]);
    }

    protected function resolve($id)
    {
        $class = new \ReflectionClass($id);
        $args = [];

        if (isset($this->defenitions[$id])) {
            $args = call_user_func($this->defenitions[$id]);
        } else {
            $constructor = $class->getConstructor();
            if ($constructor !== null) {
                foreach ($class->getConstructor()->getParameters() as $parameter) {
                    $args[] = $this->get($parameter->getType());
                }
            }
        }

        $this->services[$id] = $class->newInstance(...$args);

        return $this->services[$id];
    }
}
