<?php

namespace Api;

use Api\Bundle\BundleManager;
use ApiBundle\AttractionBundle\AttractionBundle;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Kernel
{

    protected $bundles;
    protected $bundleManager;
    protected $routes;

    public function __construct()
    {
        $this->bundles = $this->registerBundles();
        $this->bundleManager = new BundleManager($this->bundles);

        $this->routes = $this->bundleManager->getRoutes();
    }

    public function registerBundles()
    {
        return array(
            new AttractionBundle(),
        );
    }

    public function handle(Request $request)
    {
        $context = new RequestContext($request);
        $matcher = new UrlMatcher($this->routes, $context);

        try {
            $route = $matcher->match($request->getPathInfo());
        }
        catch (\Exception $e) {
            // do some error handling here.
            var_dump($e);
            return new Response('Error', 500);
        }

        $uri = $route['controller'];

        return (new $uri($request, $route))->{$route['method']}();
    }
}