<?php
/**
 * Security class for Static Site Template
 * 
 * Handles security-related functionality including input validation and XSS protection
 * 
 * @author Amigo Dheena
 * @version 1.0
 */

class Security
{
    private $config;
    
    public function __construct($config)
    {
        $this->config = $config;
    }
    
    /**
     * Sanitize input string
     * 
     * @param string $input
     * @return string
     */
    public function sanitizeInput($input)
    {
        if (!$this->config['security']['sanitize_input']) {
            return $input;
        }
        
        // Remove null bytes
        $input = str_replace(chr(0), '', $input);
        
        // Trim whitespace
        $input = trim($input);
        
        // Remove potential XSS
        $input = $this->preventXSS($input);
        
        return $input;
    }
    
    /**
     * Prevent XSS attacks
     * 
     * @param string $input
     * @return string
     */
    public function preventXSS($input)
    {
        if (!$this->config['security']['xss_protection']) {
            return $input;
        }
        
        // Convert special characters to HTML entities
        $input = htmlspecialchars($input, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        
        // Remove any remaining script tags
        $input = preg_replace('#<script[^>]*>.*?</script>#is', '', $input);
        
        return $input;
    }
    
    /**
     * Validate email address
     * 
     * @param string $email
     * @return bool
     */
    public function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    /**
     * Validate phone number (basic validation)
     * 
     * @param string $phone
     * @return bool
     */
    public function validatePhone($phone)
    {
        // Remove all non-digit characters
        $phone = preg_replace('/\D/', '', $phone);
        
        // Check if it's between 10-15 digits
        return strlen($phone) >= 10 && strlen($phone) <= 15;
    }
    
    /**
     * Generate CSRF token
     * 
     * @return string
     */
    public function generateCSRFToken()
    {
        if (!$this->config['security']['csrf_protection']) {
            return '';
        }
        
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        
        return $_SESSION['csrf_token'];
    }
    
    /**
     * Verify CSRF token
     * 
     * @param string $token
     * @return bool
     */
    public function verifyCSRFToken($token)
    {
        if (!$this->config['security']['csrf_protection']) {
            return true;
        }
        
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }
    
    /**
     * Escape output for HTML
     * 
     * @param string $string
     * @return string
     */
    public function escape($string)
    {
        return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
    
    /**
     * Check if request is HTTPS
     * 
     * @return bool
     */
    public function isHTTPS()
    {
        return (
            (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ||
            (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ||
            (!empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] === 'on') ||
            (isset($_SERVER['SERVER_PORT']) && (int) $_SERVER['SERVER_PORT'] === 443)
        );
    }
    
    /**
     * Get client IP address
     * 
     * @return string
     */
    public function getClientIP()
    {
        $ipKeys = ['HTTP_X_FORWARDED_FOR', 'HTTP_X_REAL_IP', 'HTTP_CLIENT_IP', 'REMOTE_ADDR'];
        
        foreach ($ipKeys as $key) {
            if (!empty($_SERVER[$key])) {
                $ip = $_SERVER[$key];
                if (strpos($ip, ',') !== false) {
                    $ip = trim(explode(',', $ip)[0]);
                }
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                    return $ip;
                }
            }
        }
        
        return $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    }
}
