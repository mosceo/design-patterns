<?php

namespace DesignPatterns\Composite;

require_once __DIR__ . '/Component.php';
require_once __DIR__ . '/Composite.php';
require_once __DIR__ . '/Leaf.php';

// We will implement sort of a family tree using the Composite pattern.
// Notice that the Roman object will contain both a composite and a leaf.
// But its render() method will treat them uniformly.
//
//          Roman
//            |
//      -------------
//      |           |
//    Dave        Anna
//  ---------
//  |       |
// Max    Vlad

$roman = new Composite('Roman');
$dave = new Composite('Dave');
$anna = new SateNormal('Anna');
$max = new SateNormal('Max');
$vlad = new SateNormal('Vlad');

$dave->add($max);
$dave->add($vlad);
$roman->add($dave);
$roman->add($anna);

$roman->render();
