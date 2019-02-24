<?php

namespace DesignPatterns\State;

class StateNormal implements State
{
    protected $context;

    public function __construct(Context $context)
    {
        $this->context = $context;
    }

    public function render()
    {
        $string = $this->context->getString();
        echo $string . "\n";
    }

    public function back()
    {
        $nextState = new StateUpper($this->context);
        $this->context->setState($nextState);
    }

    public function forward()
    {
        $nextState = new StateLower($this->context);
        $this->context->setState($nextState);
    }
}
