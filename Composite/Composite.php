<?php

namespace DesignPatterns\Composite;

class Composite implements Component
{
    protected $name;
    protected $components = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function render()
    {
        echo $this->name . "\n";
        echo "------------------------\n";

        foreach ($this->components as $component) {
            $component->render();
        }

        echo "------------------------\n";
    }

    public function add(Component $component)
    {
        $this->components[] = $component;
    }

    public function remove(int $i)
    {
        array_splice($this->components, $i, 1);
    }

    public function getChild(int $i): Component
    {
        return $this->components[$i];
    }
}
