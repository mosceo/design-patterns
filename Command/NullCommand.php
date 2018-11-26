<?php

class NullCommand implements ICommand
{
    public function execute()
    {
    }

    public function undo()
    {
    }
}
