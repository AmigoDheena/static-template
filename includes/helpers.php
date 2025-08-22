<?php
/**
 * Helper functions for Static Site Template
 * 
 * Global helper functions that can be used throughout the application
 * 
 * @author Amigo Dheena
 * @version 1.0
 */

// Prevent direct access
if (!defined('TEMPLATE_VERSION')) {
    die('Direct access not permitted');
}

/**
 * Get configuration value
 * 
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
function config($key, $default = null)
{
    global $core;
    return $core->config($key, $default);
}

/**
 * Escape HTML output
 * 
 * @param string $string
 * @return string
 */
function e($string)
{
    global $security;
    return $security->escape($string);
}

/**
 * Generate URL
 * 
 * @param string $route
 * @param array $params
 * @return string
 */
function url($route = '', $params = [])
{
    global $router;
    return $router->url($route, $params);
}

/**
 * Check if current route is active
 * 
 * @param string $route
 * @return bool
 */
function isActive($route)
{
    global $router;
    return $router->isCurrentRoute($route);
}

/**
 * Get active CSS class
 * 
 * @param string $route
 * @param string $activeClass
 * @return string
 */
function activeClass($route, $activeClass = 'active')
{
    return isActive($route) ? $activeClass : '';
}

/**
 * Include template partial
 * 
 * @param string $partial
 * @param array $data
 */
function partial($partial, $data = [])
{
    global $template;
    $template->partial($partial, $data);
}

/**
 * Render template and return as string
 * 
 * @param string $templateName
 * @param array $data
 * @return string
 */
function render($templateName, $data = [])
{
    global $template;
    return $template->render($templateName, $data);
}

/**
 * Set template variable
 * 
 * @param string $key
 * @param mixed $value
 */
function setVar($key, $value)
{
    global $template;
    $template->set($key, $value);
}

/**
 * Get template variable
 * 
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
function getVar($key, $default = null)
{
    global $template;
    return $template->get($key, $default);
}

/**
 * Generate page title
 * 
 * @param string $title
 * @param string $separator
 * @return string
 */
function pageTitle($title = '', $separator = ' - ')
{
    global $template;
    return $template->pageTitle($title, $separator);
}

/**
 * Generate meta description
 * 
 * @param string $description
 * @return string
 */
function metaDescription($description = '')
{
    global $template;
    return $template->metaDescription($description);
}

/**
 * Get copyright notice
 * 
 * @return string
 */
function copyright()
{
    global $template;
    return $template->copyright();
}

/**
 * Log message
 * 
 * @param string $message
 * @param string $level
 */
function logMessage($message, $level = 'INFO')
{
    global $core;
    $core->log($message, $level);
}

/**
 * Get WhatsApp button
 * 
 * @param array|string $phones
 * @param array $options
 * @return string
 */
function whatsappButton($phones = null, $options = [])
{
    global $utils;
    return $utils->getWhatsAppButton($phones, $options);
}

/**
 * Get phone button
 * 
 * @param array|string $phones
 * @param array $options
 * @return string
 */
function phoneButton($phones = null, $options = [])
{
    global $utils;
    return $utils->getPhoneButton($phones, $options);
}

/**
 * Get social media links
 * 
 * @param array $customLinks
 * @return array
 */
function socialLinks($customLinks = [])
{
    global $utils;
    return $utils->getSocialMediaLinks($customLinks);
}

/**
 * Format phone number
 * 
 * @param string $phone
 * @return string
 */
function formatPhone($phone)
{
    global $utils;
    return $utils->formatPhone($phone);
}

/**
 * Truncate text
 * 
 * @param string $text
 * @param int $length
 * @param string $suffix
 * @return string
 */
function truncate($text, $length = 150, $suffix = '...')
{
    global $utils;
    return $utils->truncateText($text, $length, $suffix);
}

/**
 * Generate slug
 * 
 * @param string $text
 * @return string
 */
function slug($text)
{
    global $utils;
    return $utils->generateSlug($text);
}

/**
 * Get current route
 * 
 * @return string
 */
function currentRoute()
{
    global $router;
    return $router->getCurrentRoute();
}

/**
 * Get current page
 * 
 * @return string
 */
function currentPage()
{
    global $router;
    return $router->getCurrentPage();
}

/**
 * Generate CSRF token
 * 
 * @return string
 */
function csrfToken()
{
    global $security;
    return $security->generateCSRFToken();
}

/**
 * Generate CSRF field for forms
 * 
 * @return string
 */
function csrfField()
{
    $token = csrfToken();
    return '<input type="hidden" name="csrf_token" value="' . e($token) . '">';
}

/**
 * Check if request method is POST
 * 
 * @return bool
 */
function isPost()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

/**
 * Check if request method is GET
 * 
 * @return bool
 */
function isGet()
{
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

/**
 * Get POST data with sanitization
 * 
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
function post($key, $default = null)
{
    global $security;
    
    if (!isset($_POST[$key])) {
        return $default;
    }
    
    return $security->sanitizeInput($_POST[$key]);
}

/**
 * Get GET data with sanitization
 * 
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
function get($key, $default = null)
{
    global $security;
    
    if (!isset($_GET[$key])) {
        return $default;
    }
    
    return $security->sanitizeInput($_GET[$key]);
}

/**
 * Redirect to URL
 * 
 * @param string $route
 * @param int $statusCode
 */
function redirect($route, $statusCode = 302)
{
    global $router;
    $router->redirect($route, $statusCode);
}

/**
 * Show 404 error page
 */
function show404()
{
    global $router;
    $router->show404();
}

/**
 * Check if application is in debug mode
 * 
 * @return bool
 */
function isDebug()
{
    global $core;
    return $core->isDebug();
}

/**
 * Get execution time
 * 
 * @return float
 */
function executionTime()
{
    global $core;
    return $core->getExecutionTime();
}

/**
 * Asset URL helper
 * 
 * @param string $asset
 * @return string
 */
function asset($asset)
{
    $baseUrl = config('site.base_url', '/');
    if ($baseUrl === '#') {
        global $router;
        $baseUrl = $router->getBaseUrl();
    }
    
    return rtrim($baseUrl, '/') . '/' . config('paths.assets', 'assets/') . ltrim($asset, '/');
}

/**
 * Include CSS file
 * 
 * @param string $file
 * @param array $attributes
 * @return string
 */
function css($file, $attributes = [])
{
    $url = asset('css/' . $file);
    $attrs = '';
    
    foreach ($attributes as $key => $value) {
        $attrs .= ' ' . $key . '="' . e($value) . '"';
    }
    
    return '<link rel="stylesheet" href="' . e($url) . '"' . $attrs . '>';
}

/**
 * Include JavaScript file
 * 
 * @param string $file
 * @param array $attributes
 * @return string
 */
function js($file, $attributes = [])
{
    $url = asset('js/' . $file);
    $attrs = '';
    
    foreach ($attributes as $key => $value) {
        $attrs .= ' ' . $key . '="' . e($value) . '"';
    }
    
    return '<script src="' . e($url) . '"' . $attrs . '></script>';
}

/**
 * Include image
 * 
 * @param string $file
 * @param string $alt
 * @param array $attributes
 * @return string
 */
function img($file, $alt = '', $attributes = [])
{
    $url = asset('images/' . $file);
    $attrs = '';
    
    foreach ($attributes as $key => $value) {
        $attrs .= ' ' . $key . '="' . e($value) . '"';
    }
    
    return '<img src="' . e($url) . '" alt="' . e($alt) . '"' . $attrs . '>';
}
