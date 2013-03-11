<?php

namespace ApiBundle\AttractionBundle;

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

class AttractionBundle implements \Api\Bundle\BundleInterface
{
    public function getRoutes()
    {
        $routes = new RouteCollection();
        $routes->add('search', new Route('/search/at', array('controller' => 'MyController')));
        $routes->add('search', new Route('/search/at/from/{from}/to/{to}', array(
            'controller' => 'MyController',
            'from' => 0,
            'to' => 20,
        )));

        return $routes;
    }

}