<?php
/**
 * Utilities class for Static Site Template
 * 
 * Contains utility functions and helpers for common operations
 * 
 * @author Amigo Dheena
 * @version 1.0
 */

class Utilities
{
    private $config;
    
    public function __construct($config)
    {
        $this->config = $config;
    }
    
    /**
     * Generate WhatsApp button HTML
     * 
     * @param array|string $phones Phone numbers
     * @param array $options Custom options
     * @return string
     */
    public function getWhatsAppButton($phones = null, $options = [])
    {
        if (!$this->config['features']['whatsapp_button']) {
            return '';
        }
        
        $phones = $phones ?: $this->config['contact']['phones'];
        $primaryPhone = is_array($phones) ? $phones[0] : $phones;
        
        $defaultOptions = [
            'position' => 'fixed',
            'bottom' => '90px',
            'right' => '25px',
            'size' => '60px',
            'z_index' => '100'
        ];
        
        $options = array_merge($defaultOptions, $options);
        
        return sprintf(
            '<a href="https://api.whatsapp.com/send?phone=%s" target="_blank" 
               style="position:%s; bottom:%s; right:%s; text-align:center; z-index:%s;" 
               title="Chat with us on WhatsApp" aria-label="WhatsApp">
                <svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 48 48">
                    <path fill="#fff" d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z"></path>
                    <path fill="#40c351" d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z"></path>
                    <path fill="#fff" d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z"></path>
                </svg>
            </a>',
            $primaryPhone,
            $options['position'],
            $options['bottom'],
            $options['right'],
            $options['z_index'],
            $options['size'],
            $options['size']
        );
    }
    
    /**
     * Generate phone button HTML
     * 
     * @param array|string $phones Phone numbers
     * @param array $options Custom options
     * @return string
     */
    public function getPhoneButton($phones = null, $options = [])
    {
        if (!$this->config['features']['phone_button']) {
            return '';
        }
        
        $phones = $phones ?: $this->config['contact']['phones'];
        $primaryPhone = is_array($phones) ? $phones[0] : $phones;
        
        $defaultOptions = [
            'position' => 'fixed',
            'bottom' => '150px',
            'right' => '25px',
            'size' => '60px',
            'z_index' => '100'
        ];
        
        $options = array_merge($defaultOptions, $options);
        
        return sprintf(
            '<a href="tel:%s" 
               style="position:%s; bottom:%s; right:%s; text-align:center; z-index:%s;" 
               title="Call us now" aria-label="Phone">                
                <svg height="60px" width="60px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-51.2 -51.2 614.40 614.40" xml:space="preserve" fill="#000000" stroke="#000000" stroke-width="0.00512"><g id="SVGRepo_bgCarrier" stroke-width="0" transform="translate(25.599999999999994,25.599999999999994), scale(0.9)"><rect x="-51.2" y="-51.2" width="614.40" height="614.40" rx="307.2" fill="#0062ff" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#004cff" stroke-width="20.48"> <style type="text/css"> .st0{fill:#ffffff;} </style> <g> <path class="st0" d="M337.168,289.578c-5.129-5.133-13.457-5.133-18.598,0l-16.031,16.038c-4.68,4.68-12.122,5.149-17.352,1.102 c0,0-15.332-10.109-40.402-35.179c-25.07-25.07-35.175-40.414-35.175-40.414c-4.055-5.226-3.578-12.656,1.102-17.343l16.031-16.031 c5.141-5.134,5.141-13.462,0-18.594l-35.34-35.343c-5.133-5.133-13.453-5.133-18.594,0c-0.122,0.125-1.906,1.906-21.309,21.32 c-22.602,22.594,7.293,91.82,57.574,142.118c50.289,50.281,119.527,80.164,142.121,57.578 c19.394-19.406,21.184-21.203,21.305-21.32c5.141-5.133,5.141-13.461,0-18.586L337.168,289.578z"></path> <path class="st0" d="M256,0C114.614,0,0,114.617,0,256s114.614,256,256,256s256-114.617,256-256S397.386,0,256,0z M256,472 c-119.102,0-216-96.898-216-216S136.898,40,256,40s216,96.898,216,216S375.102,472,256,472z"></path> </g> </g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#ffffff;} </style> <g> <path class="st0" d="M337.168,289.578c-5.129-5.133-13.457-5.133-18.598,0l-16.031,16.038c-4.68,4.68-12.122,5.149-17.352,1.102 c0,0-15.332-10.109-40.402-35.179c-25.07-25.07-35.175-40.414-35.175-40.414c-4.055-5.226-3.578-12.656,1.102-17.343l16.031-16.031 c5.141-5.134,5.141-13.462,0-18.594l-35.34-35.343c-5.133-5.133-13.453-5.133-18.594,0c-0.122,0.125-1.906,1.906-21.309,21.32 c-22.602,22.594,7.293,91.82,57.574,142.118c50.289,50.281,119.527,80.164,142.121,57.578 c19.394-19.406,21.184-21.203,21.305-21.32c5.141-5.133,5.141-13.461,0-18.586L337.168,289.578z"></path> <path class="st0" d="M256,0C114.614,0,0,114.617,0,256s114.614,256,256,256s256-114.617,256-256S397.386,0,256,0z M256,472 c-119.102,0-216-96.898-216-216S136.898,40,256,40s216,96.898,216,216S375.102,472,256,472z"></path> </g> </g></svg>
            </a>',
            $primaryPhone,
            $options['position'],
            $options['bottom'],
            $options['right'],
            $options['z_index'],
            $options['size'],
            $options['size']
        );
    }
    
    /**
     * Generate social media links
     * 
     * @param array $customLinks Custom social media links
     * @return array
     */
    public function getSocialMediaLinks($customLinks = [])
    {
        if (!$this->config['features']['social_links']) {
            return [];
        }
        
        $socialMedia = array_merge($this->config['social_media'], $customLinks);
        $links = [];
        
        $icons = [
            'facebook' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>',
            'twitter' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>',
            'instagram' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>',
            'linkedin' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>',
            'youtube' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>'
        ];
        
        foreach ($socialMedia as $platform => $url) {
            if (!empty($url) && $url !== '#') {
                $links[] = [
                    'platform' => $platform,
                    'url' => $url,
                    'icon' => isset($icons[$platform]) ? $icons[$platform] : '',
                    'label' => ucfirst($platform)
                ];
            }
        }
        
        return $links;
    }
    
    /**
     * Format phone number for display
     * 
     * @param string $phone
     * @return string
     */
    public function formatPhone($phone)
    {
        // Remove all non-digit characters
        $phone = preg_replace('/\D/', '', $phone);
        
        // Format based on length
        if (strlen($phone) === 10) {
            return preg_replace('/(\d{3})(\d{3})(\d{4})/', '($1) $2-$3', $phone);
        } elseif (strlen($phone) === 11) {
            return preg_replace('/(\d{1})(\d{3})(\d{3})(\d{4})/', '+$1 ($2) $3-$4', $phone);
        }
        
        return $phone;
    }
    
    /**
     * Truncate text to specified length
     * 
     * @param string $text
     * @param int $length
     * @param string $suffix
     * @return string
     */
    public function truncateText($text, $length = 150, $suffix = '...')
    {
        if (strlen($text) <= $length) {
            return $text;
        }
        
        return substr($text, 0, $length) . $suffix;
    }
    
    /**
     * Generate slugs from text
     * 
     * @param string $text
     * @return string
     */
    public function generateSlug($text)
    {
        // Convert to lowercase
        $slug = strtolower($text);
        
        // Replace spaces and special characters with hyphens
        $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
        
        // Remove leading/trailing hyphens
        $slug = trim($slug, '-');
        
        return $slug;
    }
    
    /**
     * Get file size in human readable format
     * 
     * @param int $bytes
     * @param int $precision
     * @return string
     */
    public function formatFileSize($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, $precision) . ' ' . $units[$i];
    }
    
    /**
     * Check if URL is valid
     * 
     * @param string $url
     * @return bool
     */
    public function isValidUrl($url)
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
    
    /**
     * Generate breadcrumbs
     * 
     * @param array $breadcrumbs
     * @return string
     */
    public function generateBreadcrumbs($breadcrumbs)
    {
        if (empty($breadcrumbs)) {
            return '';
        }
        
        $html = '<nav aria-label="breadcrumb"><ol class="breadcrumb">';
        
        foreach ($breadcrumbs as $index => $breadcrumb) {
            $isLast = ($index === count($breadcrumbs) - 1);
            
            if ($isLast) {
                $html .= '<li class="breadcrumb-item active" aria-current="page">' . htmlspecialchars($breadcrumb['label']) . '</li>';
            } else {
                $html .= '<li class="breadcrumb-item"><a href="' . htmlspecialchars($breadcrumb['url']) . '">' . htmlspecialchars($breadcrumb['label']) . '</a></li>';
            }
        }
        
        $html .= '</ol></nav>';
        
        return $html;
    }
}
