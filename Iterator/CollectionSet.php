<?php

namespace DesignPatterns\Iterator;

// This collection uses a key/value associate array to keep its items.

class CollectionSet implements Aggregate
{
    protected $set = [];

    public function add($key, $value)
    {
        $this->set[$key] = $value;
    }

    public function remove($key)
    {
        unset($this->set[$key]);
    }

    public function createIterator(): Iterator
    {
        return new CollectionSetIterator($this->set);
    }
}
