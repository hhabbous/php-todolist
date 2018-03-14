<?php

/**
 * Configuration for: Error reporting
 * Useful to show every little problem during development, but only show hard errors in production
 */
define("ENVIRONMENT", "development");
if (ENVIRONMENT == "development" || ENVIRONMENT == "dev") {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

/**
 * Configuration for: Task status
 * This is the place where you define your status ids
 */
define("NOT_STARTED", 1);
define('COMPLETED', 5);
