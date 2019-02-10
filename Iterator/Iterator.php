<?php

namespace DesignPatterns\Iterator;

interface Iterator
{
    public function hasNext(): bool;
    public function next();
}
