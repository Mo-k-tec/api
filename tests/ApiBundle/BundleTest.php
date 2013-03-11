<?php
/**
 * This file is part of the api package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class BundleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test all registered bundles.
     */
    public function testRoutes()
    {
        $kernel = new \Api\Kernel();

        foreach ($kernel->registerBundles() as $bundle) {
            $this->assertInstanceOf('\\Symfony\\Component\\Routing\\RouteCollection', $bundle->getRoutes());
        }
    }
}