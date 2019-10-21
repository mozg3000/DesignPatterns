<?php


namespace Framework;


class RegisterRoutesCommand implements CommandInterface
{
    private $routeCollection;
    private $containerBuilder;

    public function __construct(string $fullpath, ContainerBuilder $containerBuilder)
    {
        $this->routeCollection = require $fullpath;
        $this->containerBuilder = $containerBuilder;
    }
    public function execute(): void
    {
        $this->containerBuilder->set('route_collection', $this->routeCollection);
    }
}