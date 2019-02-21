<?php

namespace DesignPatterns\Composite;

// Both composites and leafs will implement this interface.
// This way the client code can treat them uniformly.

interface Component
{
    // This method is considered an operation that a component performs.
    // A composite object will delegate most of action to its children.

    public function render();

    // These methods have to do with handling children.
    // A child can be both a composite object or a leaf.

    public function add(Component $component);

    public function remove(int $i);

    public function getChild(int $i): Component;
}
