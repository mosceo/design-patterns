<?php

namespace DesignPatterns\Composite;

class Leaf implements Component
{
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function render()
    {
        echo $this->name . "\n";
    }

    // A leaf doesnt contain children so the client code is not supposed to call these methods.
    // But we still make a leaf implement the same interface so that the client code
    // can treat these two types of objects uniformly.

    public function add(Component $component)
    {
        throw new \BadMethodCallException();
    }

    public function remove(int $i)
    {
        throw new \BadMethodCallException();
    }

    public function getChild(int $i): Component
    {
        throw new \BadMethodCallException();
    }
}
