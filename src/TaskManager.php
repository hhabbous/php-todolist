<?php

namespace TODO;

use TODO\Core\Database;
use TODO\Entity\Task;

/**
 * Class TaskManager
 * @package TODO
 */
class TaskManager implements TaskStorageInterface
{

    /**
     * @var TaskStorage
     */
    private $taskStorage;

    /**
     * TaskManager constructor.
     */
    public function __construct()
    {
        $this->taskStorage = new TaskStorage(Database::getInstance()->connect());
    }


    /**
     * @param Task $task
     * @return mixed
     */
    public function add(Task $task): Task
    {
        return $this->taskStorage->add($task);
    }

    /**
     * @param Task $task
     * @return mixed
     */
    public function update(Task $task)
    {
        return $this->taskStorage->update($task);
    }

    /**
     * @param array $ids
     * @return mixed
     */
    public function delete(array $ids)
    {
        return $this->taskStorage->delete($ids);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id): Task
    {
        return $this->taskStorage->get($id);
    }

    /**
     * @return mixed
     */
    public function all(): iterable
    {
        return $this->taskStorage->all();
    }
}