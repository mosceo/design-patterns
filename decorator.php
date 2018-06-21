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
    abstract public function cost(): int;
}

class Espresso extends Beverage
{
    public function getDescription(): string
    {
        return 'Espresso';
    }

    public function cost(): int
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

    public function cost(): int
    {
        return 100;
    }
}

// Декоратор наследует от Beverage лишь с целью быть того же типа,
// чтобы декорированный объект можно было передавать вместо оригинального.

abstract class CondimentDecorator extends Beverage
{
    protected $beverage;

    public function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
    }
}

class Syrup extends CondimentDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . " (+ Syrup)";
    }

    public function cost(): int
    {
        return $this->beverage->cost() + 20; // Сложим стоимость декорированного объекта со стоимостью наполнителя
    }
}

class Cream extends CondimentDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . " (+ Cream)";
    }

    public function cost(): int
    {
        return $this->beverage->cost() + 50;
    }
}

class Liquor extends CondimentDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . " (+ Liquor)";
    }

    public function cost(): int
    {
        return $this->beverage->cost() + 100;
    }
}


$drinks = [
    new Latte(),
    new Syrup(new Latte()),
    new Cream(new Syrup(new Latte())),
    new Cream(new Syrup(new Syrup(new Latte()))) // Double syrup
];

foreach ($drinks as $drink) {
    echo $drink->getDescription() . "\n";
    echo $drink->cost() . "\n\n";
}
