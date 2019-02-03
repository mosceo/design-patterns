<?php

namespace DesignPatterns;

use NewInterface;

class Adapter implements NewInterface
{
    protected $old;

    public function __construct(OldClass $old)
    {
        $this->old = $old;
    }

    public function request1()
    {
        return (int)$this->old->specificRequest1();
    }

    public function request2()
    {
        $ret = $this->old->specificRequest2();

        return $ret[0];
    }

    public function request3()
    {
        throw new UnsupportedOperationException();
    }
}
