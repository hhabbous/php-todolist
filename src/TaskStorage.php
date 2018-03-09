<?php


namespace TODO;

use PDO;
use TODO\Core\Database;
use TODO\Entity\Task;

/**
 * Class TaskStorage
 * @package TODO
 */
class TaskStorage implements TaskStorageInterface
{

    const NOT_STARTED = 1;

    /**
     * @var Database
     */
    private $db;


    /**
     * TaskStorage constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @param Task $task
     * @return mixed
     */
    public function add(Task $task): Task
    {
        $statement = $this->db->prepare("INSERT INTO task (name, id_status) VALUES(?,?); ");
        $statement->execute([$task->getName(), self::NOT_STARTED]);

        return $this->get($this->db->lastInsertId());
    }

    /**
     * @param Task $task
     * @return mixed
     */
    public function update(Task $task)
    {
        $statement = $this->db->prepare("UPDATE task SET  name=:name, status=:status WHERE id=:id;");
        $statement->execute([$task->getName(), $task->setStatus(), $task->getId()]);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        $statement = $this->db->prepare("DELETE FROM task WHERE id=?;");
        $statement->execute([$id]);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id): Task
    {
        $statement = $this->db->prepare("SELECT t.*, ts.label FROM task t, task_status ts WHERE t.id_status=ts.id AND t.id= ?;");
        $statement->execute([$id]);

        return reset($statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Task::class));
    }

    /**
     * @return mixed
     */
    public function all(): iterable
    {
        return $this->db
            ->query("SELECT t.*, ts.label FROM task t, task_status ts WHERE t.id_status=ts.id;")
            ->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Task::class);
    }
}
