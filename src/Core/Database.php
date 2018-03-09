<?php

namespace TODO\Core;

use Dotenv\Dotenv;
use PDO;

/**
 * Class Database
 * @package TODO\Core
 */
class Database
{
    /**
     * @var
     */
    private static $instance;

    /**
     * @var Dotenv
     */
    private $dotenv;

    /**
     * Database constructor.
     */
    private function __construct()
    {
        $this->dotenv = new Dotenv(ROOT);
        $this->dotenv->load();
    }

    /**
     *
     */
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     *
     */
    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    /**
     * @return PDO
     */
    public function connect(): PDO
    {
        $dsn = sprintf(
            "%s:host=%s;dbname=%s",
            getenv("DB_DRIVER"),
            getenv("DB_HOST"),
            getenv("DB_NAME")
        );

        return new PDO($dsn, getenv("DB_USER"), getenv("DB_PASSWORD"));
    }

    /**
     * @return Database
     */
    public static function getInstance(): Database
    {
        if (is_null(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
}
