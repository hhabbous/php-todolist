<?php

namespace TODO\Entity;

/**
 * Class TaskStatus
 * @package TODO\Entity
 */
class TaskStatus
{
    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $label;

    /**
     * @return mixed
     */
    public function getId() : int
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
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }
}
