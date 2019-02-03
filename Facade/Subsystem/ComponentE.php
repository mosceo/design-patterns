<?php

namespace DesignPatterns\Subsystem;

class ComponentE
{
    protected $movie;

    public function on()
    {
        //
    }

    public function off()
    {
        //
    }

    public function play($movie)
    {
        $this->movie = $movie;
    }
}
