# PHP Static Site Template

A professional, modern, and secure PHP template for building high-performance static websites. It features an object-oriented architecture, robust security, and a developer-friendly environment.

## Features

- **Modern Architecture**: Clean, object-oriented design promoting separation of concerns.
- **Security First**: Built-in XSS protection, CSRF tokens, and secure input sanitization.
- **Responsive Design**: Mobile-first templates using Bootstrap for cross-device compatibility.
- **SEO Optimized**: Includes meta tags, structured data (JSON-LD), and clean URLs.
- **High Performance**: Efficient routing, template engine, and asset optimization.
- **Developer Friendly**: Comprehensive helper functions, debugging tools, and clear documentation.
- **Accessibility**: WCAG-compliant templates with ARIA labels for inclusive web experiences.

## Getting Started

### Requirements

- PHP 7.4 or higher
- A web server (e.g., Apache, Nginx)
- Basic knowledge of PHP and HTML

### Installation

1.  Clone or download this repository to your web server's document root.
2.  Ensure your web server's rewrite engine is enabled and configured to direct requests to `index.php`.
3.  Update the configuration in `config/config.php` to match your environment.
4.  Customize templates and content as needed.

### Configuration

All configuration is centralized in `config/config.php`. Key settings include:

- **Environment**: Set the application environment.
  ```php
  define('ENVIRONMENT', 'development'); // Options: development, staging, production
  ```
- **Site Information**: Company name, contact details, social media links.
- **Feature Toggles**: Enable or disable specific features.
- **Security Settings**: Adjust security parameters.

## File Structure

```
.
├── app.php                      # Application bootstrap and initialization
├── index.php                    # Main entry point for all requests
├── config/
│   └── config.php               # Global configuration file
├── classes/
│   ├── Core.php                 # Core application logic
│   ├── Security.php             # Security utilities (XSS, CSRF)
│   ├── Router.php               # URL routing handler
│   ├── Template.php             # Template rendering engine
│   └── Utilities.php            # General utility functions
├── includes/
│   ├── data.php                 # Main data loader
│   ├── helpers.php              # Global helper functions
│   ├── data/
│   │   ├── services.php         # Site services data
│   │   └── menu.php             # Navigation menu configuration
│   └── lib-*.php                # Legacy compatibility files (if any)
├── templates/
│   ├── layout/
│   │   ├── main.php             # Main site layout
│   │   ├── header.php           # Header partial
│   │   └── footer.php           # Footer partial
│   ├── pages/
│   │   ├── home.php             # Homepage template
│   │   └── service.php          # Service page template
│   └── errors/
│       └── 404.php              # 404 error page template
└── logs/                        # Log files (auto-created)
```

## Usage

### Creating a New Page

1.  Create a new template file in `templates/pages/`.
2.  Add a corresponding entry in the `includes/data/menu.php` configuration file.
3.  If custom logic is required, update the routing rules.

### Adding a Service

1.  Add the service details to the array in `includes/data/services.php`.
2.  The system will automatically generate the corresponding pages if the template is set up dynamically.

## Template System

The template engine provides helper functions to simplify development.

### Helper Functions

- `e($string)`: Escapes a string for safe HTML output.
- `url($route)`: Generates a full URL for a given route.
- `config($key)`: Retrieves a value from the configuration file.
- `partial($template)`: Includes a template partial (e.g., header, footer).
- `isActive($route)`: Checks if the current route matches the given route.
- `pageTitle($title)`: Generates the full page title.
- `formatPhone($phone)`: Formats a phone number for display.

### Template Variables

All templates have access to the `$config` array and global helper functions.

## Development

### Debug Mode

Set `ENVIRONMENT` to `development` in `config/config.php` to enable debug mode, which provides:

- Detailed error reporting
- Performance metrics
- Memory usage display

### Logging

The application logs errors and informational messages to the `logs/` directory. Use the `logMessage()` helper to write custom logs:

```php
logMessage('User logged in successfully.', 'INFO');
```

## Security

- **XSS Protection**: All output rendered via `e()` is sanitized.
- **CSRF Protection**: Forms can be protected using CSRF tokens.
- **Secure Headers**: Default configuration encourages secure HTTP headers.

## Backward Compatibility

The template is designed for gradual migration from legacy systems, supporting old include paths and functions to ensure a smooth transition.

## Support

For support, please review the source code comments and documentation.

## License

This template is provided as-is for educational and commercial use.

## Credits

Developed by **Amigo Dheena** for **ClickPlus Solutions**

---

**Version**: 1.0  
**Last Updated**: 2023-10-27