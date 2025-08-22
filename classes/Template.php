<?php
/**
 * Template class for Static Site Template
 * 
 * Handles template rendering and layout management
 * 
 * @author Amigo Dheena
 * @version 1.0
 */

class Template
{
    private $config;
    private $variables = [];
    private $sections = [];
    
    public function __construct($config)
    {
        $this->config = $config;
    }
    
    /**
     * Set template variable
     * 
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        $this->variables[$key] = $value;
    }
    
    /**
     * Get template variable
     * 
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return isset($this->variables[$key]) ? $this->variables[$key] : $default;
    }
    
    /**
     * Render template file
     * 
     * @param string $template Template file path
     * @param array $data Data to pass to template
     * @return string
     */
    public function render($template, $data = [])
    {
        $templateFile = $this->getTemplatePath($template);
        
        if (!file_exists($templateFile)) {
            throw new Exception("Template file not found: {$templateFile}");
        }
        
        // Merge class variables with provided data
        $templateData = array_merge($this->variables, $data);
        
        // Extract variables to template scope
        extract($templateData, EXTR_SKIP);
        
        // Start output buffering
        ob_start();
        
        try {
            include $templateFile;
            return ob_get_clean();
        } catch (Exception $e) {
            ob_end_clean();
            throw $e;
        }
    }
    
    /**
     * Include a partial template
     * 
     * @param string $partial Partial template name
     * @param array $data Data to pass to partial
     */
    public function partial($partial, $data = [])
    {
        echo $this->render($partial, $data);
    }
    
    /**
     * Start a section
     * 
     * @param string $name Section name
     */
    public function startSection($name)
    {
        $this->sections[$name] = '';
        ob_start();
    }
    
    /**
     * End a section
     * 
     * @param string $name Section name
     */
    public function endSection($name)
    {
        $this->sections[$name] = ob_get_clean();
    }
    
    /**
     * Show a section
     * 
     * @param string $name Section name
     * @param string $default Default content if section doesn't exist
     */
    public function showSection($name, $default = '')
    {
        echo isset($this->sections[$name]) ? $this->sections[$name] : $default;
    }
    
    /**
     * Get template file path
     * 
     * @param string $template
     * @return string
     */
    private function getTemplatePath($template)
    {
        $templatePath = ROOT_PATH . '/' . trim($this->config['paths']['templates'], '/') . '/';
        
        // Add .php extension if not present
        if (pathinfo($template, PATHINFO_EXTENSION) === '') {
            $template .= '.php';
        }
        
        return $templatePath . $template;
    }
    
    /**
     * Generate page title
     * 
     * @param string $title
     * @param string $separator
     * @return string
     */
    public function pageTitle($title = '', $separator = ' - ')
    {
        $siteTitle = $this->config['site']['company_name'];
        
        if (empty($title)) {
            return $siteTitle;
        }
        
        return $title . $separator . $siteTitle;
    }
    
    /**
     * Generate meta description
     * 
     * @param string $description
     * @return string
     */
    public function metaDescription($description = '')
    {
        if (empty($description)) {
            $description = 'Professional website for ' . $this->config['site']['company_name'];
        }
        
        return '<meta name="description" content="' . htmlspecialchars($description, ENT_QUOTES) . '">';
    }
    
    /**
     * Generate copyright notice
     * 
     * @return string
     */
    public function copyright()
    {
        $year = $this->config['site']['copyright_year'];
        $company = $this->config['site']['company_name'];
        $developer = $this->config['site']['developer'];
        
        return sprintf(
            '© Copyright %s %s | Developed by <a class="text-white" href="%s" title="%s" rel="dofollow">%s</a>',
            $year,
            htmlspecialchars($company),
            htmlspecialchars($developer['url']),
            htmlspecialchars($developer['title']),
            htmlspecialchars($developer['name'])
        );
    }
}
