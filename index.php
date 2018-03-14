<?php
// set a constant that holds the project's folder path.
define("ROOT", __DIR__);

// This is the auto-loader for Composer-dependencies (to load tools into your project).
require "vendor/autoload.php";

// load application config (error reporting etc.)
require "src/Config/Config.php";

// load application class
use TODO\Core\Application;

// start the application
$application = new Application();
