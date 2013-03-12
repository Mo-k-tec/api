<?php

namespace Api\Bundle;

/**
 * Class BundleInterface
 *
 * @package Api\Bundle
 */
interface BundleInterface
{
    /**
     * Return a collection of routes for the current bundle.
     *
     * @return \Symfony\Component\Routing\RouteCollection
     */
    public function getRoutes();
}
