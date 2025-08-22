<?php
/**
 * Services Data Template for Static Site Template Framework
 * 
 * This file contains example data structure for services/products.
 * Replace the example data with your own content.
 * 
 * @author Amigo Dheena
 * @version 1.0
 */

// Prevent direct access
if (!defined('TEMPLATE_VERSION')) {
    die('Direct access not permitted');
}

/**
 * Get services data - Example implementation
 * 
 * Replace this with your own services/products data structure
 * 
 * @return array
 */
function getServicesData()
{
    // Example data structure - replace with your own content
    return [
        'service-1' => [
            'Name' => 'Service Name 1',
            'Slug' => 'service-1',
            'Desc' => 'Description of your first service. Replace this with your actual service description.',
            'Image' => 'service-1.jpg',
            'Keywords' => ['keyword1', 'keyword2', 'keyword3'],
            'Featured' => true,
            'Price' => 'Your pricing',
            'Category' => 'Category Name'
        ],
        'service-2' => [
            'Name' => 'Service Name 2',
            'Slug' => 'service-2',
            'Desc' => 'Description of your second service. Add your actual content here.',
            'Image' => 'service-2.jpg',
            'Keywords' => ['keyword4', 'keyword5', 'keyword6'],
            'Featured' => true,
            'Price' => 'Your pricing',
            'Category' => 'Category Name'
        ],
        'service-3' => [
            'Name' => 'Service Name 3',
            'Slug' => 'service-3',
            'Desc' => 'Description of your third service. Customize as needed for your business.',
            'Image' => 'service-3.jpg',
            'Keywords' => ['keyword7', 'keyword8', 'keyword9'],
            'Featured' => false,
            'Price' => 'Your pricing',
            'Category' => 'Category Name'
        ]
        
        // Add more services as needed:
        // 'your-service-slug' => [
        //     'Name' => 'Your Service Name',
        //     'Slug' => 'your-service-slug',
        //     'Desc' => 'Your service description',
        //     'Image' => 'your-image.jpg',
        //     'Keywords' => ['your', 'keywords'],
        //     'Featured' => true|false,
        //     'Price' => 'Your price',
        //     'Category' => 'Your category'
        // ]
    ];
}

/**
 * Get service by slug
 * 
 * @param string $slug
 * @return array|null
 */
function getServiceBySlug($slug)
{
    $services = getServicesData();
    
    foreach ($services as $service) {
        if ($service['Slug'] === $slug) {
            return $service;
        }
    }
    
    return null;
}

/**
 * Get featured services
 * 
 * @return array
 */
function getFeaturedServices()
{
    $services = getServicesData();
    $featured = [];
    
    foreach ($services as $service) {
        if (isset($service['Featured']) && $service['Featured'] === true) {
            $featured[] = $service;
        }
    }
    
    return $featured;
}

/**
 * Get services for listing
 * 
 * @return array
 */
function getServicesForListing()
{
    $services = getServicesData();
    $listing = [];
    
    foreach ($services as $key => $service) {
        $listing[] = array_merge($service, [
            'PageKey' => $key,
            'Url' => url($service['Slug']) // Use the slug for URL generation
        ]);
    }
    
    return $listing;
}
