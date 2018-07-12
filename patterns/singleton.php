<?php

// Паттерн Синглтон позволяет ограничить кол-во экземпляров класса до одного.
// Конструктор делается приватным, чтобы никто не мог инстанциировать класс извне.
// Создание единственного экземпляра и доступ к нему управляется статическим методом класса.

class Singleton
{
    private function __construct() {}

    static private $instance = null;

    static public function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}


// $obj = new Singleton();  // Так мы уже не можем сделать! Нужно использовать статический метод.
$obj1 = Singleton::getInstance();
$obj2 = Singleton::getInstance();
var_dump($obj1 === $obj2); // true
