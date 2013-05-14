<?php

namespace Api;

use Api\Bundle\BundleInterface;
use Api\Bundle\BundleManager;
use ApiBundle\AttractionBundle\AttractionBundle;
use ApiBundle\HotelBundle\HotelBundle;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\EventListener\RouterListener;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class Kernel
 *
 * @package Api
 */
class Kernel
{
    /**
     * @var BundleInterface[]
     */
    protected $bundles;

    /**
     * @var Bundle\BundleManager
     */
    protected $bundleManager;

    /**
     * @var \Symfony\Component\Routing\RouteCollection
     */
    protected $routes;

    protected $templates;

    /**
     * Build all needed data.
     */
    public function __construct()
    {
        $this->bundles = $this->registerBundles();
        $this->bundleManager = new BundleManager($this->bundles);

        $this->routes = $this->bundleManager->getRoutes();
    }

    /**
     * Register all bundles.
     *
     * @api
     * @return array
     */
    public function registerBundles()
    {
        return array(
            new AttractionBundle(),
            new HotelBundle(),
        );
    }

    /**
     * Handle the request.
     * The route will be resolved, the controller will return the response.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request)
    {
        $context = new RequestContext($request);
        $matcher = new UrlMatcher($this->routes, $context);

        try {
            $route = $matcher->match($request->getPathInfo());
        } catch (\Exception $e) {
            // do some error handling here.

            return new Response('Error', 404);
        }

        $uri = $route['_controller'];
        $controller = new $uri($request, $route);

        $response = $controller->{$route['method']}();

        return $response;
    }
}
