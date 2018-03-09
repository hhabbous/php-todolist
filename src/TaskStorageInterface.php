<?php

namespace TODO;

use TODO\Entity\Task;

/**
 * Interface TaskStorageInterface
 * @package TODO
 */
interface TaskStorageInterface
{

    /**
     * @param Task $task
     * @return mixed
     */
    public function add(Task $task);

    /**
     * @param Task $task
     * @return mixed
     */
    public function update(Task $task);

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id): Task;

    /**
     * @return mixed
     */
    public function all(): iterable;
}
