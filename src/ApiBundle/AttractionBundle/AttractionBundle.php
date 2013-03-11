<?php

namespace ApiBundle\AttractionBundle;

use Api\Bundle\BundleInterface;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

/**
 * Class AttractionBundle
 *
 * @package ApiBundle\AttractionBundle
 */
class AttractionBundle implements BundleInterface
{
    /**
     * {@inheritdoc}
     */
    public function getRoutes()
    {
        $routes = new RouteCollection();

        $routes->add('search', new Route('/search/at', array(
            'controller' => '\\ApiBundle\\AttractionBundle\\Controller\\SearchController',
            'method' => 'search',
        )));
        $routes->add('search_range', new Route('/search/at/from/{from}/to/{to}', array(
            'controller' => '\\ApiBundle\\AttractionBundle\\Controller\\SearchController',
            'method' => 'searchRange',
            'from' => 0,
            'to' => 20,
        )));

        return $routes;
    }

}