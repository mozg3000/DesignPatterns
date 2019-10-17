<?php


namespace Framework;


class RegisterConfigCommand implements CommandInterface
{
    private $fileLocator;
    private $fileLoader;
    private $filename;


    public function __construct(string $path, string $filename, ContainerBuilder $containerBuilder)
    {
        $this->fileLocator = new FileLocator($path);
        $this->filename = $filename;
        $this->fileLoader = new PhpFileLoader($containerBuilder,  $this->fileLocator);
    }

    /**
     * @return PhpFileLoader
     */
    public function getFileLoader(): PhpFileLoader
    {
        return $this->fileLoader;
    }
    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    public function execute(): void
    {
        $this->getFileLoader()->load($this->getFilename());
    }
}