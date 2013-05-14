<?php

namespace ApiBundle\HotelBundle\Controller;

use Api\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SearchController
 *
 * @package ApiBundle\AttractionBundle\Controller
 */
class SearchController extends AbstractController
{
    public function search()
    {
        return new Response('search hotel output');
    }
}
