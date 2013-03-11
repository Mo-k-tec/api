<?php

namespace Api\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class ControllerInterface
 *
 * @package Api\Controller
 */
interface ControllerInterface
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param array $route
     */
    public function __construct(Request $request, $route);
}
