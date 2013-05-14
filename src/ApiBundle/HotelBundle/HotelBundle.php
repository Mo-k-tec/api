<?php

namespace ApiBundle\HotelBundle;

use Api\Bundle\BundleInterface;
use Api\Kernel;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Templating\Loader\FilesystemLoader;

/**
 * Class AttractionBundle
 *
 * @package ApiBundle\AttractionBundle
 */
class HotelBundle implements BundleInterface
{
    /**
     * {@inheritdoc}
     */
    public function getRoutes()
    {
        $routes = new RouteCollection();

        // Keys must be unique, same keys will override.
        $routes->add(
            'ho_search',
            new Route('/search/ho', array(
                '_controller' => '\\ApiBundle\\HotelBundle\\Controller\\SearchController',
                'method' => 'search',
            ))
        );
        $routes->add(
            'ho_search_range',
            new Route('/search/ho/from/{from}/to/{to}', array(
                '_controller' => '\\ApiBundle\\HotelBundle\\Controller\\SearchController',
                'method' => 'searchRange',
                'from' => 0,
                'to' => 20,
            ))
        );

        return $routes;
    }
}