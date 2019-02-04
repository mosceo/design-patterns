<?php

namespace DesignPatterns;

abstract class AbstractClass
{
    /**
     * We make the template method final. The steps of the algorithm are decided.
     */
    final protected function templateMethod()
    {
        $this->concreteOperation1();
        $this->primitiveOperation1();
        $this->concreteOperation2();
        if ($this->hook()) {
            $this->primitiveOperation2();
        }
    }

    /**
     * These two methods are set in stone and can't be changed.
     */
    protected function concreteOperation1()
    {
        //
    }

    protected function concreteOperation2()
    {
        //
    }

    /**
     * Some methods have the default implementation. They can be overwritten in a subclass to change its behaviour.
     * Methods like these are called hooks.
     */
    protected function hook()
    {
        return true;
    }

    /**
     * These two methods are sort of gaps in the algorithm. They must be implemented by a subclass.
     */
    abstract protected function primitiveOperation1();

    abstract protected function primitiveOperation2();
}
