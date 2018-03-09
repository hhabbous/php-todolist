<?php

namespace TODO\Controller;

use TODO\Entity\Task;
use TODO\TaskManager;

/**
 * Class TaskController
 * @package TODO\Controller
 */
class TaskController
{
    /**
     * @var TaskManager
     */
    private $taskManager;

    /**
     * TaskController constructor.
     */
    public function __construct()
    {

        $this->taskManager = new TaskManager();
    }

    /**
     * List all tasks
     */
    public function index(): void
    {
        require ROOT . "/src/View/index.html.php";
    }


    public function add(string $name)
    {
        $task = new Task();
        $task->setName(urldecode($name));

        $this->taskManager->add($task);
    }


    public function all(): void
    {
        $tasks = $this->taskManager->all();
        require ROOT . "/src/View/content.html.php";
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        $this->taskManager->delete($id);
    }

}

