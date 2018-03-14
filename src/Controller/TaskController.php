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


    public function add()
    {
        $param = $this->getPostParam();

        $task = new Task();
        $task->setName(urldecode($param["name"]));

        $this->taskManager->add($task);
    }


    public function all(): void
    {
        $tasks = $this->taskManager->all();
        require ROOT . "/src/View/content.html.php";
    }


    public function delete(): void
    {
        $param = $this->getPostParam();
        $this->taskManager->delete($param["ids"]);
    }


    public function update(int $id): void
    {
        $param = $this->getPostParam();
        $task = $this->taskManager->get($id);
        $task->setName(urldecode($param["name"]));

        $task->getStatus()->setId((($param["status"] === "true") ? COMPLETED : NOT_STARTED));
        $this->taskManager->update($task);
    }


    private function getPostParam(): array
    {
        return $_POST;
    }

}

