<?php
/**
 * This file is part of the api package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class BundleManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testEmptyRoutes()
    {
        $manager = new \Api\Bundle\BundleManager(array());

        $this->assertEquals(new \Symfony\Component\Routing\RouteCollection(), $manager->getRoutes());
    }
}