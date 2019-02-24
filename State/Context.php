<?php

namespace DesignPatterns\State;

class Context
{
    protected $string;

    protected $state;

    public function __construct(string $string)
    {
        $this->string = $string;

        $this->state = new StateNormal($this);
    }

    public function setState(State $state)
    {
        $this->state = $state;
    }

    public function getString(): string
    {
        return $this->string;
    }

    public function render()
    {
        $this->state->render();
    }

    public function back()
    {
        $this->state->back();

        $this->render();
    }

    public function forward()
    {
        $this->state->forward();

        $this->render();
    }
}
