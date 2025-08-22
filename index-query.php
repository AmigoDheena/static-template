<?php
/**
 * Alternative index file with query parameter routing
 * Use this if .htaccess URL rewriting isn't working
 * 
 * URLs will be: index.php?page=about instead of /about
 */

// Load the application bootstrap
require_once 'app.php';

// Load data and handle routing
require_once 'includes/data.php';

// Override the router's current page detection for query parameter method
if (isset($_GET['page'])) {
    $router = $GLOBALS['router'];
    $router->setCurrentPage($_GET['page']);
}

// Special routing test
if (currentPage() === 'test-routing') {
    include 'test-routing.php';
    exit;
}

// Handle page routing
$pageTemplate = handlePageRouting();

// If we found a specific template, render it
if ($pageTemplate) {
    echo render('layout/main', [
        'content' => render('pages/' . $pageTemplate)
    ]);
} else {
    // If no specific page handler, try to load a template file
    $currentPage = currentPage();
    $templateFile = ROOT_PATH . '/templates/pages/' . $currentPage . '.php';
    
    if (file_exists($templateFile)) {
        // Load the template
        echo render('layout/main', [
            'content' => render('pages/' . $currentPage)
        ]);
    } else {
        // Show 404 page
        show404();
    }
}
?>
