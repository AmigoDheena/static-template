<?php
/**
 * Legacy footer file for backward compatibility
 * 
 * @deprecated Use templates/layout/footer.php instead
 */

// Load the application bootstrap if not already loaded
if (!defined('TEMPLATE_VERSION')) {
    require_once dirname(__DIR__) . '/app.php';
    require_once 'data.php';
}

// Include the new footer template
partial('layout/footer');