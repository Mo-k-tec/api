<?php

namespace Api\Controller;

use Symfony\Component\HttpFoundation\Request;

abstract class AbstractController implements ControllerInterface
{
    protected $request;
    protected $route;

    public function __construct(Request $request, $route)
    {
        $this->request = $request;
        $this->route = $route;
    }
}
