<?php
/**
 * Legacy template file for backward compatibility
 * 
 * @author Amigo Dheena
 * @version 1.0
 * @deprecated Use the new template system instead
 */

    // Load the application
    if (!defined('TEMPLATE_VERSION')) {
    require_once 'app.php';
    require_once 'includes/data.php';
}

// Handle legacy template loading
$pageFound = handlePageRouting();

if ($pageFound) {
    // Load the main template with service content
    echo render('layout/main', [
        'content' => render('pages/service')
    ]);
} else {
    // Show 404 page
    show404();
}