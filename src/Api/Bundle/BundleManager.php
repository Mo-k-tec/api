<?php

namespace Api\Bundle;

use Symfony\Component\Routing\RouteCollection;

class BundleManager
{
    /**
     * @var BundleInterface[]
     */
    protected $bundles;

    public function __construct($bundles)
    {
        $this->bundles = $bundles;
    }

    public function getRoutes()
    {
        $routes = new RouteCollection();

        foreach ($this->bundles as $bundle) {
            $routes->addCollection($bundle->getRoutes());
        }

        return $routes;
    }
}
