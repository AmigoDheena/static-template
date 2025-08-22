<?php
/**
 * Menu data for Static Site Template
 * 
 * @author Amigo Dheena
 * @version 1.0
 */

// Prevent direct access
if (!defined('TEMPLATE_VERSION')) {
    die('Direct access not permitted');
}

/**
 * Get main navigation menu
 * 
 * @return array
 */
function getNavigationMenu()
{
    global $router;
    
    $menuItems = [
        [
            'label' => 'Home',
            'route' => 'home',
            'url' => url(),
            'icon' => 'fas fa-home'
        ],
        [
            'label' => 'About',
            'route' => 'about',
            'url' => url('about'),
            'icon' => 'fas fa-info-circle'
        ],
        [
            'label' => 'Services',
            'route' => 'services',
            'url' => url('services'),
            'icon' => 'fas fa-cogs',
            'dropdown' => getFeaturedServices()
        ],
        [
            'label' => 'Contact',
            'route' => 'contact',
            'url' => url('contact'),
            'icon' => 'fas fa-envelope'
        ]
    ];
    
    return $router->generateMenu($menuItems);
}

/**
 * Get footer menu
 * 
 * @return array
 */
function getFooterMenu()
{
    return [
        [
            'label' => 'Privacy Policy',
            'route' => 'privacy',
            'url' => url('privacy')
        ],
        [
            'label' => 'Terms of Service',
            'route' => 'terms',
            'url' => url('terms')
        ],
        [
            'label' => 'Sitemap',
            'route' => 'sitemap',
            'url' => url('sitemap')
        ]
    ];
}

/**
 * Generate breadcrumbs for current page
 * 
 * @return array
 */
function getCurrentBreadcrumbs()
{
    global $router, $template;
    
    $currentPage = $router->getCurrentPage();
    $breadcrumbs = [
        [
            'label' => 'Home',
            'url' => url()
        ]
    ];
    
    // Add current page to breadcrumbs if not home
    if ($currentPage !== 'home' && !empty($currentPage)) {
        $pageTitle = $template->get('page_title', ucfirst($currentPage));
        $breadcrumbs[] = [
            'label' => $pageTitle,
            'url' => url($currentPage)
        ];
    }
    
    return $breadcrumbs;
}

/**
 * Check if menu item is active
 * 
 * @param string $route
 * @return bool
 */
function isMenuActive($route)
{
    global $router;
    
    $currentPage = $router->getCurrentPage();
    
    // Handle home page
    if ($route === 'home' || $route === '') {
        return $currentPage === 'home' || empty($currentPage);
    }
    
    return $currentPage === $route;
}

/**
 * Get CSS class for active menu items
 * 
 * @param string $route
 * @param string $activeClass
 * @return string
 */
function getMenuActiveClass($route, $activeClass = 'active')
{
    return isMenuActive($route) ? $activeClass : '';
}
