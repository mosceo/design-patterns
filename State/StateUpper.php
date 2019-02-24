<?php

namespace DesignPatterns\State;

class StateUpper implements State
{
    protected $context;

    public function __construct(Context $context)
    {
        $this->context = $context;
    }

    public function render()
    {
        $string = $this->context->getString();
        echo strtoupper($string) . "\n";
    }

    public function back()
    {
        //
    }

    public function forward()
    {
        $nextState = new StateNormal($this->context);
        $this->context->setState($nextState);
    }
}
