<?php

namespace TODO\Entity;

/**
 * Class Task
 * @package TODO\Entity
 */
class Task
{
    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $name;
    /**
     * @var
     */
    private $status;

    /**
     * Task constructor.
     */
    public function __construct()
    {
        $this->status = new TaskStatus();
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "id_status":
                $this->status->setId($value);
                break;
            case "label":
                $this->status->setLabel($value);
                break;
        }
    }

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }
}
