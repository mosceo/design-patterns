<?php

class Invoker
{
    protected $commands;
    protected $executedCommands = [];

    public function __construct(array $commands)
    {
        $this->commands = $commands;
    }

    public function pressExecute(int $id)
    {
        $command = $this->commands[$id];

        $command->execute();
        $this->executedCommands[] = $command;
    }

    public function pressUndo()
    {
        $command = array_pop($this->executedCommands);

        if ($command) {
            $command->undo();
        }
    }
}
