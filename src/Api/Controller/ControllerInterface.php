<?php

namespace Api\Controller;

use Symfony\Component\HttpFoundation\Request;

interface ControllerInterface
{
    public function __construct(Request $request, $route);
}
