<?php
/**
 * Configuration file for Static Site Template
 * 
 * @author Amigo Dheena
 * @version 1.0
 */

// Prevent direct access
if (!defined('TEMPLATE_VERSION')) {
    die('Direct access not permitted');
}

// Environment Configuration
define('ENVIRONMENT', 'development'); // development, staging, production

// Application Configuration
$config = [
    'app' => [
        'name' => 'Static Site Template',
        'version' => '1.0.0',
        'timezone' => 'UTC',
        'charset' => 'UTF-8',
        'debug' => (ENVIRONMENT === 'development')
    ],
    
    'site' => [
        'base_url' => '#',
        'company_name' => 'Company Name',
        'author' => 'Amigo Dheena',
        'copyright_year' => date('Y'),
        'developer' => [
            'name' => 'Company Name',
            'url' => 'https://website.co.in',
            'title' => 'Company Name'
        ]
    ],
    
    'contact' => [
        'phones' => ['9876543210', '1234567890'],
        'email' => 'admin@email.com',
        'address' => [
            'full' => '254 Street Avenue, Los Angeles, LA 2415 US',
            'short' => 'Los Angeles, LA 2415 US'
        ]
    ],
    
    'social_media' => [
        'facebook' => '#',
        'twitter' => '#',
        'instagram' => '#',
        'linkedin' => '#',
        'youtube' => '#'
    ],
    
    'features' => [
        'whatsapp_button' => false,
        'phone_button' => false,
        'social_links' => true,
        'contact_forms' => true
    ],
    
    'paths' => [
        'templates' => 'templates/',
        'includes' => 'includes/',
        'assets' => 'assets/',
        'uploads' => 'uploads/'
    ],
    
    'security' => [
        'csrf_protection' => true,
        'xss_protection' => true,
        'sanitize_input' => true
    ]
];

// Set timezone
date_default_timezone_set($config['app']['timezone']);

// Error reporting based on environment
if (ENVIRONMENT === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

return $config;
