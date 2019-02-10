<?php

namespace DesignPatterns\Iterator;

class CollectionIterator implements Iterator
{
    protected $items = [];
    protected $index = 0;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function hasNext(): bool
    {
        return $this->index < count($this->items);
    }

    public function next()
    {
        $item = $this->items[$this->index];
        $this->index++;

        return $item;
    }
}
