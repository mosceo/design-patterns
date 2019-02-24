<?php

namespace DesignPatterns\State;

class StateLower implements State
{
    protected $context;

    public function __construct(Context $context)
    {
        $this->context = $context;
    }

    public function render()
    {
        $string = $this->context->getString();
        echo strtolower($string) . "\n";
    }

    public function back()
    {
        $nextState = new StateNormal($this->context);
        $this->context->setState($nextState);
    }

    public function forward()
    {
        $nextState = null;

        if (rand(0, 1)) {
            $nextState = new StateExclamation($this->context);
        } else {
            $nextState = new StateStrongExclamation($this->context);
        }

        $this->context->setState($nextState);
    }
}
