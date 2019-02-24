<?php

namespace DesignPatterns\Composite;

class Composite implements State
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

    public function add(State $component)
    {
        $this->components[] = $component;
    }

    public function remove(int $i)
    {
        array_splice($this->components, $i, 1);
    }

    public function getChild(int $i): State
    {
        return $this->components[$i];
    }
}
