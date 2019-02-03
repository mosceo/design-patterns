<?php

namespace DesignPatterns;

use OldInterface;

class OldClass implements OldInterface
{
    public function specificRequest1()
    {
        return "1000";
    }

    public function specificRequest2()
    {
        return [12, 0];
    }

    public function specificRequest3()
    {
        return "SomethingVerySpecific";
    }
}
