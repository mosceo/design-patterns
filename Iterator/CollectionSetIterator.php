<?php

namespace DesignPatterns\Iterator;

class CollectionSetIterator implements Iterator
{
    protected $set;
    protected $keys;
    protected $index;

    public function __construct($set)
    {
        $this->set = $set;
        $this->keys = array_keys($set);
        $this->index = 0;
    }

    public function hasNext(): bool
    {
        return $this->index < count($this->keys);
    }

    public function next()
    {
        $key = $this->keys[$this->index];
        $value = $this->set[$key];
        $this->index++;

        return $value;
    }
}
