<?php

namespace ApiBundle\AttractionBundle\Controller;

use Api\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\Loader\FilesystemLoader;

/**
 * Class SearchController
 *
 * @package ApiBundle\AttractionBundle\Controller
 */
class SearchController extends AbstractController
{
    public function search()
    {
        $render = $this->render('search');
        $response = new Response($render['data'], $render['key']);
        $response->setTtl(99999);


        return $response;
    }
}
