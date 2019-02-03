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

    // Originally it is a string, but we expect a number
    public function request1()
    {
        return (int)$this->old->specificRequest1();
    }

    // Can't translate properly
    public function request2()
    {
        $ret = $this->old->specificRequest2();

        return $ret[0];
    }

    // Can't translate at all
    public function request3()
    {
        throw new UnsupportedOperationException();
    }
}
