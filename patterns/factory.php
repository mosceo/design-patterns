<?php

/*
 * There are three common types of factories: Simple factory, Factory Method and Abstract Factory.
 *
 * Simple Factory -- Instantiation of objects is delegated to some class.
 */

//////////////////////
/// Simple Factory ///
//////////////////////

class ObjectA {}
class ObjectB {}
class ObjectC {}

class SimpleFactory
{
    public function createObject(string $objectType)
    {
        $obj = null;

        switch($objectType) {
            case 'typeA':
                $obj = new ObjectA();
                break;
            case 'typeB':
                $obj = new ObjectB();
                break;
            case 'typeC':
                $obj = new ObjectC();
                break;
            default:
                throw new Exception('Incorrect object type');
        }

        return $obj;
    }
}



$fact = new SimpleFactory();
$obj = $fact->createObject('typeD');
var_dump($obj);
