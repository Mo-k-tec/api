<?php

namespace ApiBundle\AttractionBundle\Controller;

use Api\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class SearchController extends AbstractController
{
    public function search()
    {
        return new Response('search output');
    }
}
