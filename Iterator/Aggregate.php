<?php

namespace DesignPatterns\Iterator;

interface Aggregate
{
    public function createIterator(): Iterator;
}
