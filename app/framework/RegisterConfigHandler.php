<?php


namespace Framework;


class RegisterConfigHandler implements CommandInterface
{

    private RegisterConfigCommand $command;

    /**
     * RegisterConfigHandler constructor.
     * @param RegisterConfigCommand $command
     */
    public function __construct(RegisterConfigCommand $command)
    {
        $this->command = $command;

    }

    public function execute(): void
    {
        try {
            $this->command->getFileLoader()->load($this->command->getFilename());
        } catch (\Throwable $e) {
            die('Cannot read the config file. File: ' . __FILE__ . '. Line: ' . __LINE__);
        }
    }
}