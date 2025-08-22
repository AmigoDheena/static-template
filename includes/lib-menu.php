<?php 
/**
 * Legacy menu functions for backward compatibility
 * 
 * @author Amigo Dheena
 * @version 1.0
 * @deprecated Use the new menu system in data/menu.php
 */

// Prevent direct access
if (!defined('TEMPLATE_VERSION')) {
    die('Direct access not permitted');
}

/**
 * Legacy active menu function
 * 
 * @deprecated Use activeClass() helper function instead
 * @param string $currentPage
 */
function active($currentPage)
{
    echo activeClass($currentPage);
}

/**
 * Legacy menu array
 * 
 * @deprecated Use getNavigationMenu() function instead
 */
$menu = [
    ['Home', url()],
    ['About', url('about')],
    ['Services', url('services')],
    ['Contact', url('contact')],
];

// For backward compatibility, convert to new format
function getLegacyMenu()
{
    global $menu;
    $newMenu = [];
    
    foreach ($menu as $item) {
        $newMenu[] = [
            'label' => $item[0],
            'url' => $item[1],
            'route' => basename($item[1], '.php')
        ];
    }
    
    return $newMenu;
}