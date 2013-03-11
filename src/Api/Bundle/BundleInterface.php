<?php

namespace Api\Bundle;

interface BundleInterface
{
    /**
     * @return \Symfony\Component\Routing\RouteCollection
     */
    public function getRoutes();
}
