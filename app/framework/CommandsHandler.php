<?php


namespace Framework;


class CommandsHandler implements CommandInterface
{
    /**
     * @var CommandInterface [] $todo
     */
    private array $todo = [];

    /**
     * CommandsHandler constructor.
     * @param CommandInterface [] $todo
     */
    public function __construct(array  $todo)
    {
        $this->todo = $todo;
    }

    public function execute(): void
    {
        foreach ($this->todo as $task){

            $task->execute();
        }
    }
}