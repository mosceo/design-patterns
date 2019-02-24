<?php

namespace DesignPatterns\State;

require_once __DIR__ . '/Context.php';
require_once __DIR__ . '/State.php';
require_once __DIR__ . '/StateNormal.php';
require_once __DIR__ . '/StateLower.php';
require_once __DIR__ . '/StateUpper.php';
require_once __DIR__ . '/StateExclamation.php';
require_once __DIR__ . '/StateStrongExclamation.php';

$context = new Context('Apple Tree');

$context->render();

$context->forward();
$context->forward();
$context->back();
$context->forward();
$context->forward();
$context->back(); // It doesn't go back here
