<?php

namespace DesignPatterns\Iterator;

// This collection uses a simple array to keep its items.

class Collection implements Aggregate
{
    protected $items;

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function add($item)
    {
        $this->items[] = $item;
    }

    public function remove($targetItem)
    {
        foreach ($this->items as $index => $item) {
            if ($item === $targetItem) {
                array_splice($this->items, $index, 1);
            }
        }
    }

    public function createIterator(): Iterator
    {
        return new CollectionIterator($this->items);
    }
}
