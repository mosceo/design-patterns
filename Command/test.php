<?php

require 'ICommand.php';
require 'Command.php';
require 'NullCommand.php';
require 'MacroCommand.php';
require 'Receiver.php';
require 'Invoker.php';

/*
 * Testing Command and NullCommand
 */

echo "Testing commands:\n";
echo "-----------------\n";

$receiver1 = new Receiver(1);
$receiver2 = new Receiver(2);
$receiver3 = new Receiver(3);

$command0 = new NullCommand();
$command1 = new Command($receiver1);
$command2 = new Command($receiver2);
$command3 = new Command($receiver3);

$invoker = new Invoker([$command0, $command1, $command2, $command3]);

$invoker->pressExecute(0);
$invoker->pressExecute(1);
$invoker->pressExecute(2);
$invoker->pressUndo();
$invoker->pressExecute(3);
$invoker->pressUndo();
$invoker->pressUndo();
$invoker->pressUndo();

/*
 * Testing MacroCommand
 */

echo "\nTesting a macro command:\n";
echo "------------------------\n";

$macroCommand = new MacroCommand([$command3, $command2, $command1]);
$invoker = new Invoker([$macroCommand]);

$invoker->pressExecute(0);
$invoker->pressUndo();
