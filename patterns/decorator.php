<?php

// Паттерн "Декоратор" позволяет обернуть объекты в другие объекты, которые имеют тот же тип
// и расширить существующий функционал. Обычно вызывается оригинальных метод объекта и
// выполняется какая-то логика до и/или после вызова. Класс-декоратор наследует от оригинального
// класса только с целью иметь тот же тип.

// В данной программе мы разрабатываем классы для кофейни. Мы создадим два напитка (эспрессо и латте)
// и три наполнителя (сироп, крем и ликёр). Оборачивая напиток в один или несколько
// наполнителей-декораторов мы создаём конечный напиток. Стоимость напитка вычисляется с помощью
// обхода слоёв внутрь.

abstract class Beverage
{
    abstract public function getDescription(): string;
    abstract public function getCost(): int;
}

class Espresso extends Beverage
{
    public function getDescription(): string
    {
        return 'Espresso';
    }

    public function getCost(): int
    {
        return 60;
    }
}

class Latte extends Beverage
{
    public function getDescription(): string
    {
        return 'Latté';
    }

    public function getCost(): int
    {
        return 100;
    }
}

// Декоратор наследует от Beverage лишь с целью быть того же типа,
// чтобы декорированный объект можно было передавать вместо оригинального.

abstract class CondimentDecorator extends Beverage
{
    static protected $cost = 0;
    static protected $name = 'Not defined';

    protected $beverage;

    public function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
    }

    public function getCost(): int
    {
        // Сложим стоимость напитка (или декорированного напитка) со стоимостью наполнителя
        return $this->beverage->getCost() + static::$cost;
    }

    public function getDescription(): string
    {
        return $this->beverage->getDescription()." (+ ".static::$name.")";
    }
}

class Syrup extends CondimentDecorator
{
    static protected $cost = 20;
    static protected $name = 'Syrup';
}

class Cream extends CondimentDecorator
{
    static protected $cost = 50;
    static protected $name = 'Cream';
}

class Liquor extends CondimentDecorator
{
    static protected $cost = 100;
    static protected $name = 'Liquor';
}

/*
 * Run
 */

$drinks = [
    new Latte(),
    new Syrup(new Latte()),
    new Cream(new Syrup(new Latte())),
    new Cream(new Syrup(new Syrup(new Latte()))) // Double syrup
];

foreach ($drinks as $drink) {
    echo $drink->getDescription() . "\n";
    echo $drink->getCost() . "\n\n";
}
