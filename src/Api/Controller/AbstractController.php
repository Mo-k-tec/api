<?php

namespace Api\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class AbstractController
 * Add some basic controller functionality.
 *
 * @package Api\Controller
 */
abstract class AbstractController implements ControllerInterface
{
    /**
     * @var \Symfony\Component\HttpFoundation\Request
     */
    protected $request;

    /**
     * @var array
     */
    protected $route;

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param $route
     */
    public function __construct(Request $request, $route)
    {
        $this->request = $request;
        $this->route = $route;
    }
}
