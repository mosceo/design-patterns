<?php

/*
 * There are three common types of factories: Simple factory, Factory Method and Abstract Factory.
 *
 * Simple Factory -- Instantiation of objects is delegated to some class.
 */

//////////////////////
/// Simple Factory ///
//////////////////////
namespace Patterns\SimpleFactory;


class ObjectA {}
class ObjectB {}
class ObjectC {}

class SimpleFactory
{
    public function createObject(string $type)
    {
        $obj = null;

        switch($type) {
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
                throw new \Exception('Incorrect object type');
        }

        return $obj;
    }
}

// An example of a class that uses factories.
class Client
{
    public function __construct(SimpleFactory $factory)
    {
        $this->factory = $factory;
    }

    public function doSomething()
    {
        $objectA = $this->factory->createObject('typeA');
        $objectB = $this->factory->createObject('typeB');
        // perform computation
    }
}


//////////////////////
/// Factory Method ///
//////////////////////
// The class that uses the objects has a method that creates these objects.
// But this method is defined as abstract. The superclass contains the code that uses the objects
// and subclasses contain the code that creates the objects. This way the code creating objects
// is decoupled from the code that is using them.
//
namespace Patterns\FactoryMethod;


class ObjectXA {}
class ObjectXB {}
class ObjectXC {}

class ObjectYA {}
class ObjectYB {}
class ObjectYC {}

abstract class Client
{
    public function doSomething()
    {
        $objectA = $this->createObject('typeA');
        $objectB = $this->createObject('typeB');
        var_dump($objectA);
        var_dump($objectB);
        // perform computation
    }

    abstract protected function createObject($type);
}

class ClientX extends Client
{
    protected function createObject($type)
    {
        switch($type) {
            case 'typeA':
                $obj = new ObjectXA();
                break;
            case 'typeB':
                $obj = new ObjectXB();
                break;
            case 'typeC':
                $obj = new ObjectXC();
                break;
            default:
                throw new \Exception('Incorrect object type');
        }

        return $obj;
    }
}

class ClientY extends Client
{
    protected function createObject($type)
    {
        switch($type) {
            case 'typeA':
                $obj = new ObjectYA();
                break;
            case 'typeB':
                $obj = new ObjectYB();
                break;
            case 'typeC':
                $obj = new ObjectYC();
                break;
            default:
                throw new \Exception('Incorrect object type');
        }

        return $obj;
    }
}
