# Static Site Template

A professional PHP static site template with modern architecture, security features, and responsive design.

## Features

- **Modern Architecture**: Object-oriented design with proper separation of concerns
- **Security First**: Built-in XSS protection, CSRF tokens, and input sanitization
- **Responsive Design**: Mobile-first responsive templates using Bootstrap
- **SEO Optimized**: Proper meta tags, structured data, and semantic HTML
- **Performance Optimized**: Efficient routing, template caching, and optimized assets
- **Developer Friendly**: Comprehensive documentation, helper functions, and debugging tools
- **Accessibility**: WCAG compliant templates with proper ARIA labels

## Requirements

- PHP 7.4 or higher
- Web server (Apache/Nginx)
- Basic knowledge of PHP and HTML

## Installation

1. Clone or download this repository to your web server
2. Configure your web server to point to the template directory
3. Update the configuration in `config/config.php`
4. Customize templates and content as needed

## Configuration

### Basic Configuration

Edit `config/config.php` to customize:

- Company information
- Contact details
- Social media links
- Feature toggles
- Security settings

### Environment Configuration

Set the environment in `config/config.php`:

```php
define('ENVIRONMENT', 'development'); // development, staging, production
```

## File Structure

```
├── app.php                      # Application bootstrap
├── index.php                    # Main entry point
├── config/
│   └── config.php              # Configuration file
├── classes/
│   ├── Core.php                # Core application class
│   ├── Security.php            # Security utilities
│   ├── Router.php              # URL routing
│   ├── Template.php            # Template engine
│   └── Utilities.php           # Utility functions
├── includes/
│   ├── data.php                # Data management
│   ├── helpers.php             # Helper functions
│   ├── data/
│   │   ├── services.php        # Services data
│   │   └── menu.php            # Menu configuration
│   └── lib-*.php               # Legacy compatibility files
├── templates/
│   ├── layout/
│   │   ├── main.php            # Main layout template
│   │   ├── header.php          # Header template
│   │   └── footer.php          # Footer template
│   ├── pages/
│   │   ├── home.php            # Homepage template
│   │   └── service.php         # Service page template
│   └── errors/
│       └── 404.php             # 404 error page
└── logs/                       # Log files (auto-created)
```

## Usage

### Creating Pages

1. Add page templates in `templates/pages/`
2. Update menu configuration in `includes/data/menu.php`
3. Add routing logic if needed

### Adding Services

1. Edit `includes/data/services.php`
2. Add service data to the array
3. Create service-specific templates if needed

### Customizing Design

1. Edit templates in `templates/` directory
2. Update CSS in your assets directory
3. Modify the layout templates for global changes

## Template System

### Helper Functions

- `e($string)` - Escape HTML output
- `url($route)` - Generate URLs
- `config($key)` - Get configuration values
- `partial($template)` - Include template partials
- `isActive($route)` - Check if route is active
- `pageTitle($title)` - Generate page titles
- `formatPhone($phone)` - Format phone numbers

### Template Variables

Templates have access to:

- `$config` - Configuration array
- Global helper functions
- Template-specific variables

## Security Features

- XSS protection for all output
- CSRF token protection for forms
- Input sanitization
- Secure headers
- SQL injection prevention (when using databases)

## SEO Features

- Clean URLs
- Meta tags optimization
- Structured data (JSON-LD)
- Sitemap generation ready
- Open Graph tags
- Twitter Card tags

## Performance

- Efficient template rendering
- Optimized asset loading
- Built-in caching ready
- Minimal memory footprint
- Fast routing system

## Development

### Debug Mode

Enable debug mode in development:

```php
define('ENVIRONMENT', 'development');
```

This enables:
- Detailed error reporting
- Debug information display
- Performance metrics
- Memory usage tracking

### Logging

All errors and activities are logged to `logs/` directory:

```php
logMessage('Custom log message', 'INFO');
```

## Backward Compatibility

The template maintains compatibility with legacy code:

- Old include paths still work
- Legacy functions are available
- Gradual migration path provided

## Customization

### Adding New Features

1. Create new classes in `classes/` directory
2. Register in `app.php`
3. Add helper functions in `includes/helpers.php`
4. Update configuration as needed

### Extending Templates

1. Create new template files
2. Use the template engine for rendering
3. Follow the established naming conventions

## Support

For support and updates:

- Check the documentation
- Review the code comments
- Contact the developer

## License

This template is provided as-is for educational and commercial use.

## Credits

Developed by **Amigo Dheena** for **ClickPlus Solutions**

---

**Version**: 1.0  
**Last Updated**: <?= date('Y-m-d') ?>
