<?php
/**
 * Core class for Static Site Template
 * 
 * Handles core application functionality, error handling, and basic operations
 * 
 * @author Amigo Dheena
 * @version 1.0
 */

class Core
{
    private $config;
    private $startTime;
    
    public function __construct($config)
    {
        $this->config = $config;
        $this->startTime = microtime(true);
    }
    
    /**
     * Get configuration value
     * 
     * @param string $key Dot notation key (e.g., 'app.name')
     * @param mixed $default Default value if key not found
     * @return mixed
     */
    public function config($key, $default = null)
    {
        $keys = explode('.', $key);
        $value = $this->config;
        
        foreach ($keys as $k) {
            if (!isset($value[$k])) {
                return $default;
            }
            $value = $value[$k];
        }
        
        return $value;
    }
    
    /**
     * Check if application is in debug mode
     * 
     * @return bool
     */
    public function isDebug()
    {
        return $this->config('app.debug', false);
    }
    
    /**
     * Get application execution time
     * 
     * @return float
     */
    public function getExecutionTime()
    {
        return microtime(true) - $this->startTime;
    }
    
    /**
     * Log message to file
     * 
     * @param string $message
     * @param string $level
     */
    public function log($message, $level = 'INFO')
    {
        $logFile = ROOT_PATH . '/logs/' . date('Y-m-d') . '.log';
        $timestamp = date('Y-m-d H:i:s');
        $logEntry = "[{$timestamp}] [{$level}] {$message}" . PHP_EOL;
        
        if (!file_exists(dirname($logFile))) {
            mkdir(dirname($logFile), 0755, true);
        }
        
        file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);
    }
    
    /**
     * Custom error handler
     * 
     * @param int $errno
     * @param string $errstr
     * @param string $errfile
     * @param int $errline
     */
    public function errorHandler($errno, $errstr, $errfile, $errline)
    {
        $errorTypes = [
            E_ERROR => 'ERROR',
            E_WARNING => 'WARNING',
            E_NOTICE => 'NOTICE',
            E_USER_ERROR => 'USER_ERROR',
            E_USER_WARNING => 'USER_WARNING',
            E_USER_NOTICE => 'USER_NOTICE'
        ];
        
        $errorType = isset($errorTypes[$errno]) ? $errorTypes[$errno] : 'UNKNOWN';
        $message = "{$errorType}: {$errstr} in {$errfile} on line {$errline}";
        
        $this->log($message, 'ERROR');
        
        if ($this->isDebug()) {
            echo "<div style='background: #f8d7da; color: #721c24; padding: 10px; margin: 10px; border: 1px solid #f5c6cb; border-radius: 4px;'>";
            echo "<strong>Error:</strong> {$message}";
            echo "</div>";
        }
    }
    
    /**
     * Custom exception handler
     * 
     * @param Exception $exception
     */
    public function exceptionHandler($exception)
    {
        $message = "Uncaught exception: " . $exception->getMessage() . " in " . $exception->getFile() . " on line " . $exception->getLine();
        $this->log($message, 'EXCEPTION');
        
        if ($this->isDebug()) {
            echo "<div style='background: #f8d7da; color: #721c24; padding: 10px; margin: 10px; border: 1px solid #f5c6cb; border-radius: 4px;'>";
            echo "<strong>Exception:</strong> " . $exception->getMessage();
            echo "<br><strong>File:</strong> " . $exception->getFile();
            echo "<br><strong>Line:</strong> " . $exception->getLine();
            echo "<pre>" . $exception->getTraceAsString() . "</pre>";
            echo "</div>";
        } else {
            echo "<h1>Something went wrong</h1>";
            echo "<p>We're sorry, but something went wrong. Please try again later.</p>";
        }
    }
    
    /**
     * Redirect to URL
     * 
     * @param string $url
     * @param int $statusCode
     */
    public function redirect($url, $statusCode = 302)
    {
        header("Location: {$url}", true, $statusCode);
        exit;
    }
    
    /**
     * Set HTTP response code
     * 
     * @param int $code
     */
    public function setResponseCode($code)
    {
        http_response_code($code);
    }
}
