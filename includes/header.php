<?php
/**
 * Legacy header file for backward compatibility
 * 
 * @deprecated Use templates/layout/header.php instead
 */

// Load the application bootstrap if not already loaded
if (!defined('TEMPLATE_VERSION')) {
    require_once dirname(__DIR__) . '/app.php';
    require_once 'data.php';
}

// Include the new header template
partial('layout/header');