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
    public function add(Task $task): Task;

    /**
     * @param Task $task
     * @return mixed
     */
    public function update(Task $task);

    /**
     * @param array $ids
     * @return mixed
     */
    public function delete(array $ids);

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
