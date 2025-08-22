<?php
/**
 * Legacy services functions for backward compatibility
 * 
 * @author Amigo Dheena
 * @version 1.0
 * @deprecated Use the new services system in data/services.php
 */

// Prevent direct access
if (!defined('TEMPLATE_VERSION')) {
    die('Direct access not permitted');
}

// Load new services data
require_once 'data/services.php';

/**
 * Legacy services array for backward compatibility
 * 
 * @deprecated Use getServicesData() function instead
 */
$services = getServicesData();