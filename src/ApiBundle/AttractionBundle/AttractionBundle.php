<?php

namespace ApiBundle\AttractionBundle;

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
class AttractionBundle implements BundleInterface
{
    /**
     * {@inheritdoc}
     */
    public function getRoutes()
    {
        $routes = new RouteCollection();

        // Keys must be unique, same keys will override.
        $routes->add(
            'at_search',
            new Route('/search/at', array(
                '_controller' => '\\ApiBundle\\AttractionBundle\\Controller\\SearchController',
                'method' => 'search',
            ))
        );
        $routes->add(
            'at_search_range',
            new Route('/search/at/from/{from}/to/{to}', array(
                '_controller' => '\\ApiBundle\\AttractionBundle\\Controller\\SearchController',
                'method' => 'searchRange',
                'from' => 0,
                'to' => 20,
            ))
        );

        return $routes;
    }
}