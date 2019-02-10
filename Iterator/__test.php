<?php

namespace DesignPatterns\Iterator;

require_once __DIR__ . '/Aggregate.php';
require_once __DIR__ . '/Iterator.php';
require_once __DIR__ . '/CollectionIterator.php';
require_once __DIR__ . '/CollectionSetIterator.php';
require_once __DIR__ . '/Collection.php';
require_once __DIR__ . '/CollectionSet.php';

function printCollection(Aggregate $collection)
{
    $iterator = $collection->createIterator();

    while ($iterator->hasNext()) {
        $item = $iterator->next();
        echo $item . PHP_EOL;
    }
}

// We create two collections with different implementations, but the code that prints them is the same.
// It is because the code works only with iterators of the same type that hide inner implementations.

$collection1 = new Collection([1, 2, 3, 4, 5]);

$collection2 = new CollectionSet();
$collection2->add('name', 'Dave');
$collection2->add('age', '30');
$collection2->add('sex', 'male');

printCollection($collection1);
echo "-------------------" . PHP_EOL;
printCollection($collection2);
