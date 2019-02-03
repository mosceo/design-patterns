<?php

namespace DesignPatterns;

use DesignPatterns\Subsystem\ComponentA;
use DesignPatterns\Subsystem\ComponentB;
use DesignPatterns\Subsystem\ComponentC;
use DesignPatterns\Subsystem\ComponentD;
use DesignPatterns\Subsystem\ComponentE;

class Facade
{
    protected $a;
    protected $b;
    protected $c;
    protected $d;
    protected $e;

    public function __construct(
        ComponentA $a,
        ComponentB $b,
        ComponentC $c,
        ComponentD $d,
        ComponentE $e
    )
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        $this->d = $d;
        $this->e = $e;
    }

    public function watch($movie)
    {
        $this->a->on();
        $this->b->up();
        $this->c->method1();
        $this->c->method2();
        $this->d->set(10);
        $this->e->on();
        $this->e->play($movie);
    }

    public function end()
    {
        $this->a->off();
        $this->b->down();
        $this->c->method3();
        $this->d->set(0);
        $this->e->off();
    }
}
