<?php
/**
 * Base Controller
 */
namespace SlimUtils\Controller;

use \Slim\Container as Container;

/**
 * Base Controller Class
 */
abstract class BaseController
{
    /**
     * Container
     *
     * @var Container
     */
    protected $container;

    /**
     * Contruct get container
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Get container
     *
     * @param mixed $property
     * @return void
     */
    public function __get($property)
    {
        if ($this->container->{$property}) {
            return $this->container->{$property};
        }
    }
}
