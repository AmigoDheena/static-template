<?php
/**
 * Router class for Static Site Template
 * 
 * Handles URL routing and page navigation
 * 
 * @author Amigo Dheena
 * @version 1.0
 */

class Router
{
    private $config;
    private $routes = [];
    private $currentRoute;
    
    public function __construct($config)
    {
        $this->config = $config;
        $this->parseCurrentRoute();
    }
    
    /**
     * Parse current route from URL
     */
    private function parseCurrentRoute()
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        $scriptName = $_SERVER['SCRIPT_NAME'];
        
        // Remove script name from request URI
        $basePath = dirname($scriptName);
        if ($basePath !== '/') {
            $requestUri = substr($requestUri, strlen($basePath));
        }
        
        // Remove query string
        $requestUri = strtok($requestUri, '?');
        
        // Clean up the route
        $this->currentRoute = trim($requestUri, '/');
        
        // Default to home if empty
        if (empty($this->currentRoute)) {
            $this->currentRoute = 'home';
        }
    }
    
    /**
     * Get current route
     * 
     * @return string
     */
    public function getCurrentRoute()
    {
        return $this->currentRoute;
    }
    
    /**
     * Set current page (for query parameter routing)
     * 
     * @param string $page
     */
    public function setCurrentPage($page)
    {
        $this->currentRoute = trim($page, '/');
        if (empty($this->currentRoute)) {
            $this->currentRoute = 'home';
        }
    }
    
    /**
     * Get current page name
     * 
     * @return string
     */
    public function getCurrentPage()
    {
        $route = $this->getCurrentRoute();
        
        // Remove .php extension if present
        if (substr($route, -4) === '.php') {
            $route = substr($route, 0, -4);
        }
        
        return $route;
    }
    
    /**
     * Check if current route matches
     * 
     * @param string $route
     * @return bool
     */
    public function isCurrentRoute($route)
    {
        return $this->getCurrentPage() === $route;
    }
    
    /**
     * Generate URL for a route
     * 
     * @param string $route
     * @param array $params
     * @return string
     */
    public function url($route = '', $params = [])
    {
        $baseUrl = $this->config['site']['base_url'];
        
        if ($baseUrl === '#') {
            $baseUrl = $this->getBaseUrl();
        }
        
        $url = rtrim($baseUrl, '/');
        
        if (!empty($route) && $route !== 'home') {
            $url .= '/' . ltrim($route, '/');
        }
        
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }
        
        return $url;
    }
    
    /**
     * Get base URL
     * 
     * @return string
     */
    public function getBaseUrl()
    {
        $protocol = $this->isHTTPS() ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        $scriptName = $_SERVER['SCRIPT_NAME'];
        $basePath = dirname($scriptName);
        
        if ($basePath === '/') {
            $basePath = '';
        }
        
        return $protocol . '://' . $host . $basePath;
    }
    
    /**
     * Check if request is HTTPS
     * 
     * @return bool
     */
    private function isHTTPS()
    {
        return (
            (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ||
            (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ||
            (!empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] === 'on') ||
            (isset($_SERVER['SERVER_PORT']) && (int) $_SERVER['SERVER_PORT'] === 443)
        );
    }
    
    /**
     * Generate navigation menu
     * 
     * @param array $menuItems
     * @param string $activeClass
     * @return array
     */
    public function generateMenu($menuItems, $activeClass = 'active')
    {
        $menu = [];
        $currentPage = $this->getCurrentPage();
        
        foreach ($menuItems as $item) {
            $route = isset($item['route']) ? $item['route'] : '';
            $label = isset($item['label']) ? $item['label'] : '';
            $url = $this->url($route);
            
            $isActive = ($route === 'home' && ($currentPage === 'home' || $currentPage === '')) || 
                       ($route !== 'home' && $currentPage === $route);
            
            $menu[] = [
                'label' => $label,
                'url' => $url,
                'route' => $route,
                'active' => $isActive,
                'class' => $isActive ? $activeClass : ''
            ];
        }
        
        return $menu;
    }
    
    /**
     * Redirect to route
     * 
     * @param string $route
     * @param int $statusCode
     */
    public function redirect($route, $statusCode = 302)
    {
        $url = $this->url($route);
        header("Location: {$url}", true, $statusCode);
        exit;
    }
    
    /**
     * Show 404 error
     */
    public function show404()
    {
        http_response_code(404);
        
        // Try to load 404 template
        try {
            global $template;
            echo $template->render('errors/404', [
                'title' => 'Page Not Found',
                'message' => 'The requested page could not be found.'
            ]);
        } catch (Exception $e) {
            // Fallback 404 page
            echo '<!DOCTYPE html>
<html>
<head>
    <title>404 - Page Not Found</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
        .error-container { max-width: 600px; margin: 0 auto; }
        h1 { color: #e74c3c; font-size: 72px; margin: 0; }
        h2 { color: #333; }
        p { color: #666; font-size: 18px; }
        a { color: #3498db; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>404</h1>
        <h2>Page Not Found</h2>
        <p>The page you are looking for could not be found.</p>
        <p><a href="' . $this->url() . '">Return to Home</a></p>
    </div>
</body>
</html>';
        }
        exit;
    }
}
