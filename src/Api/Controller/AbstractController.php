<?php

namespace Api\Controller;

use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;

/**
 * Class AbstractController
 * Add some basic controller functionality.
 *
 * @package Api\Controller
 */
abstract class AbstractController implements ControllerInterface
{
    /**
     * @var \Symfony\Component\HttpFoundation\Request
     */
    protected $request;

    /**
     * @var array
     */
    protected $route;

    /**
     * @var string
     */
    protected $bundleDir;

    /**
     * @var array
     */
    protected $defaultTemplates;

    /**
     * @var \Symfony\Component\Finder\Finder
     */
    protected $finder;

    /**
     * @var string
     */
    protected $apiDir;

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param $route
     */
    public function __construct(Request $request, $route)
    {
        $this->request = $request;
        $this->route = $route;
        $this->getBundleDir();
        $this->findDefaultTemplatesDir();
    }

    protected function render($template, $args = array())
    {
        $loader = new FilesystemLoader($this->getBundleDir() . '/Views/%name%');
        $view = new PhpEngine(new TemplateNameParser(), $loader);
        $name = $template . '.' . $this->request->query->get('format', 'xml') . '.php';
        $nameGeneral = $this->request->query->get('format', 'xml') . '.php';

        if ($view->exists($name)) {
            return array(
                'data' => $view->render($name, $args),
                'key' => 200
            );
        }
        else {
            $loader = new FilesystemLoader($this->apiDir . '/Views/%name%');
            $view = new PhpEngine(new TemplateNameParser(), $loader);

            if ($this->finder->name($name) && $this->finder->count()) {
                return array(
                    'data' => $view->render($name, $args),
                    'key' => 200
                );
            }
            elseif ($this->finder->name($nameGeneral) && $this->finder->count()) {
                return array(
                    'data' => $view->render($nameGeneral, $args),
                    'key' => 200
                );
            }
            else {
                return array(
                    'data' => $view->render('404.php', array('page' => $name, 'general' => $nameGeneral)),
                    'key' => 404
                );
            }
        }
    }

    protected function getBundleDir()
    {
        if (is_null($this->bundleDir)) {
            $ref = new \ReflectionClass($this);
            $this->bundleDir = dirname(dirname($ref->getFileName()));
        }

        return $this->bundleDir;
    }

    protected function findDefaultTemplatesDir()
    {
        $this->apiDir = dirname(__DIR__);
        $this->finder = new Finder();
        $this->finder->files()->in($this->apiDir . '/Views');
    }
}
