<?php

namespace DesignPatterns;

/*
 * We implement the abstract methods and some hooks and by this fill in the gaps in the algorithm.
 */

class ConcreteClass extends AbstractClass
{
    protected function hook()
    {
        return false;
    }

    protected function primitiveOperation1()
    {
        //
    }

    protected function primitiveOperation2()
    {
        //
    }
}
