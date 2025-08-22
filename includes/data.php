<?php
/**
 * Data management file for Static Site Template
 * 
 * This file handles data loading and initialization
 * 
 * @author Amigo Dheena
 * @version 1.0
 */

// Prevent direct access
if (!defined('TEMPLATE_VERSION')) {
    die('Direct access not permitted');
}

// Load services data
require_once 'data/services.php';
require_once 'data/menu.php';

/**
 * Initialize application data
 */
function initializeData()
{
    global $template, $router, $utils, $config;
    
    // Set common template variables
    $template->set('company_name', config('site.company_name'));
    $template->set('phone_numbers', config('contact.phones'));
    $template->set('email', config('contact.email'));
    $template->set('address', config('contact.address'));
    $template->set('current_year', date('Y'));
    $template->set('author_meta', '<meta name="author" content="' . e(config('site.author')) . '">');
    
    // Set social media links
    $template->set('social_links', $utils->getSocialMediaLinks());
    
    // Set floating buttons
    if (config('features.whatsapp_button')) {
        $template->set('whatsapp_button', $utils->getWhatsAppButton());
    }
    
    if (config('features.phone_button')) {
        $template->set('phone_button', $utils->getPhoneButton());
    }
    
    // Set navigation menu
    $template->set('navigation_menu', getNavigationMenu());
    
    // Set copyright notice
    $template->set('footer_credit', copyright());
    
    // Set current page information
    $currentPage = $router->getCurrentPage();
    $template->set('current_page', $currentPage);
    $template->set('current_route', $router->getCurrentRoute());
    
    // Set common paths
    $template->set('header_path', 'templates/layout/header');
    $template->set('footer_path', 'templates/layout/footer');
}

/**
 * Handle page routing and content loading
 */
function handlePageRouting()
{
    global $router, $template;
    
    $currentPage = $router->getCurrentPage();
    $services = getServicesData();
    
    // First check if it's a service by slug (e.g., wedding-photography)
    $serviceBySlug = getServiceBySlug($currentPage);
    if ($serviceBySlug) {
        // Load service data
        $template->set('page_title', $serviceBySlug['Name']);
        $template->set('page_slug', $serviceBySlug['Slug']);
        $template->set('page_description', $serviceBySlug['Desc']);
        $template->set('page_type', 'service');
        
        // Set meta data
        $template->set('meta_title', pageTitle($serviceBySlug['Name']));
        $template->set('meta_description', metaDescription($serviceBySlug['Desc']));
        
        return 'service'; // Return template type
    }
    
    // Check if it's a service page by .php format (legacy support)
    $servicePage = $currentPage . '.php';
    if (array_key_exists($servicePage, $services)) {
        // Load service data
        $service = $services[$servicePage];
        $template->set('page_title', $service['Name']);
        $template->set('page_slug', $service['Slug']);
        $template->set('page_description', $service['Desc']);
        $template->set('page_type', 'service');
        
        // Set meta data
        $template->set('meta_title', pageTitle($service['Name']));
        $template->set('meta_description', metaDescription($service['Desc']));
        
        return 'service'; // Return template type
    }
    
    // Handle static pages
    $staticPages = [
        'home' => [
            'title' => 'Home',
            'description' => 'Welcome to ' . config('site.company_name'),
            'template' => 'home'
        ],
        'about' => [
            'title' => 'About Us',
            'description' => 'Learn more about ' . config('site.company_name'),
            'template' => 'about'
        ],
        'services' => [
            'title' => 'Our Services',
            'description' => 'Discover our professional services',
            'template' => 'services'
        ],
        'contact' => [
            'title' => 'Contact Us',
            'description' => 'Get in touch with ' . config('site.company_name'),
            'template' => 'contact'
        ]
    ];
    
    if (isset($staticPages[$currentPage])) {
        $page = $staticPages[$currentPage];
        $template->set('page_title', $page['title']);
        $template->set('page_description', $page['description']);
        $template->set('page_type', 'static');
        
        // Set meta data
        $template->set('meta_title', pageTitle($page['title']));
        $template->set('meta_description', metaDescription($page['description']));
        
        return $page['template']; // Return specific template name
    }
    
    return false;
}

// Initialize data when this file is included
initializeData();