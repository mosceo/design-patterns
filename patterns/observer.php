<?php

// Паттерн "Наблюдатель" позволяет объектам подписываться на обновления определенного объекта,
// а также в любой момент отписаться от обновлений. Этот объект при изменении своего состояния
// сообщает каждому своему "наблюдателю" об этом, обычно вызывая на нём определенный метод.

// В данной программе классы, за объектами которых можно наблюдать реализуют интерфейс Subject.
// А классы, объекты которых могут наблюдать, реализуют интерфейс Observer.
// Мы создадим класс, состоянием которого представляется одним целым числом. Другой класс может
// наблюдать за изменениями этого числа. При получении определенного числа заданное кол-во раз,
// он перестаёт наблюдать.

interface Subject
{
    public function addObserver(Observer $o);
    public function removeObserver(Observer $o);
    public function notifyObservers();

    public function getState();
}

interface Observer
{
    public function update(Subject $s);
}


class Number implements Subject
{
    protected $num;
    protected $observers = [];

    public function addObserver(Observer $o)
    {
        if (!in_array($o, $this->observers)) {
            $this->observers[] = $o;
        }
    }

    public function removeObserver(Observer $o)
    {
        $key = array_search($o, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notifyObservers()
    {
        foreach ($this->observers as $o) {
            $o->update($this);
        }
    }

    public function getState()
    {
        return $this->num;
    }

    public function setState($num)
    {
        $this->num = $num;
        $this->notifyObservers();
    }
}

class NumberListener implements Observer
{
    protected $target; // Это число нас интересует
    protected $times; // Мы хотим получить его данное кол-во раз
    protected $cnt; // Столько раз мы уже его получили

    public function __construct($target, $times)
    {
        $this->target = $target;
        $this->times = $times;
        $this->cnt = 0;
    }

    public function update(Subject $s)
    {
        if ($s->getState() === $this->target) {
            $this->cnt += 1;

            echo "I received {$this->target} for the {$this->cnt} time!\n";

            if ($this->cnt >= $this->times) {
                $s->removeObserver($this);
            }
        }
    }
}

$s = new Number;
$a = new NumberListener(5, 2); // I want to receive a '5' 2 times
$b = new NumberListener(8, 3); // I want to receive a '8' 3 times

$s->addObserver($a);
$s->addObserver($b);

$s->setState(5); // I received 5 for the 1 time!
$s->setState(8); // I received 8 for the 1 time!
$s->setState(5); // I received 5 for the 2 time! (removes itself from observers)
$s->setState(8); // I received 8 for the 2 time!
$s->setState(5); //
$s->setState(8); // I received 8 for the 3 time! (removes itself from observers)
$s->setState(8); //
