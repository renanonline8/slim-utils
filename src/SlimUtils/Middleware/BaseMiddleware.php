<?php
/**
 * Base Middleware
 */
namespace SlimUtils\Middleware;

use \Slim\Container as Container;

abstract class BaseMiddleware
{
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function __get($property)
    {
        if ($this->container->{$property}) {
            return $this->container->{$property};
        }
    }
}
