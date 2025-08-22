<?php
/**
 * Bootstrap file for Static Site Template
 * 
 * This file initializes the application and loads all necessary components
 * 
 * @author Amigo Dheena
 * @version 1.0
 */

// Define application constants
define('TEMPLATE_VERSION', '1.0.0');
define('ROOT_PATH', __DIR__);
define('CONFIG_PATH', ROOT_PATH . '/config');
define('INCLUDES_PATH', ROOT_PATH . '/includes');
define('CLASSES_PATH', ROOT_PATH . '/classes');

// Load configuration
$config = require_once CONFIG_PATH . '/config.php';

// Load core classes
require_once CLASSES_PATH . '/Core.php';
require_once CLASSES_PATH . '/Security.php';
require_once CLASSES_PATH . '/Router.php';
require_once CLASSES_PATH . '/Template.php';
require_once CLASSES_PATH . '/Utilities.php';

// Load helpers
require_once INCLUDES_PATH . '/helpers.php';

// Initialize core application
$core = new Core($config);
$security = new Security($config);
$router = new Router($config);
$template = new Template($config);
$utils = new Utilities($config);

// Make core objects globally available
$GLOBALS['core'] = $core;
$GLOBALS['security'] = $security;
$GLOBALS['router'] = $router;
$GLOBALS['template'] = $template;
$GLOBALS['utils'] = $utils;
$GLOBALS['config'] = $config;

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Set error handler
set_error_handler([$core, 'errorHandler']);
set_exception_handler([$core, 'exceptionHandler']);
