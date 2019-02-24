<?php

namespace DesignPatterns\State;

interface State
{
    public function render();

    public function back();

    public function forward();
}
