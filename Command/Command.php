<?php

class Command implements ICommand
{
    protected $receiver;

    public function __construct(Receiver $receiver)
    {
        $this->receiver = $receiver;
    }

    public function execute()
    {
        $this->receiver->on();
    }

    public function undo()
    {
        $this->receiver->off();
    }
}
