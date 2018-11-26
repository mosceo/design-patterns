<?php

class Receiver
{
    public $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function on()
    {
        echo "Receiver {$this->id} is ON\n";
    }

    public function off()
    {
        echo "Receiver {$this->id} is OFF\n";
    }
}
