<?php

use Api\Kernel;
use Symfony\Component\HttpFoundation\Request;

require_once(__DIR__ . '/../bootstrap.php');

$kernel = new Kernel();

$kernel->handle(Request::createFromGlobals())->send();
