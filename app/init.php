<?php

/*
 * Initialization file
 * Contains defined variables
 * Sets the autoloader
 */


// Root for the app directory
define('APP_ROOT', dirname(__FILE__));

// Root for the public directory
define('PUBLIC_ROOT', dirname(__FILE__).'/../public');

// Public URL
define('URL', 'http://localhost/movies-api');

// Database params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'movies-api');

// Start session
session_start();

// Autoload classes
spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php';
});
