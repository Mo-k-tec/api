<?php

namespace Api\Bundle;

use Symfony\Component\Routing\RouteCollection;

/**
 * Class BundleManager
 * Manage all bundles. This helper will access the public api's of the bundles.
 *
 * @package Api\Bundle
 */
class BundleManager
{
    /**
     * @var BundleInterface[]
     */
    protected $bundles;

    /**
     * @param BundleInterface[] $bundles
     */
    public function __construct($bundles)
    {
        $this->bundles = $bundles;
    }

    /**
     * Get the routes of all bundles.
     *
     * @return \Symfony\Component\Routing\RouteCollection
     */
    public function getRoutes()
    {
        $routes = new RouteCollection();

        foreach ($this->bundles as $bundle) {
            $routes->addCollection($bundle->getRoutes());
        }

        return $routes;
    }
}
