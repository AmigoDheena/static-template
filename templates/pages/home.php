<!-- Framework Welcome Page -->
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <!-- Header -->
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-primary mb-3">
                    <i class="fas fa-code me-3"></i>Static Site Template
                </h1>
                <p class="lead text-muted">A professional PHP framework for building static websites</p>
                <p class="text-muted">Version <?= e(config('app.version')) ?> • PHP <?= PHP_VERSION ?></p>
            </div>

            <!-- Quick Start Guide -->
            <div class="row g-4 mb-5">
                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-rocket me-2"></i>Quick Start</h5>
                        </div>
                        <div class="card-body">
                            <h6>1. Configuration</h6>
                            <p class="small text-muted">Edit <code>config/config.php</code> to set your site details:</p>
                            <pre class="bg-light p-3 rounded small">
<code>'site' => [
    'company_name' => 'Your Company',
    'base_url' => 'https://yoursite.com',
],
'contact' => [
    'phones' => ['your-phone'],
    'email' => 'your@email.com',
]</code></pre>

                            <h6 class="mt-3">2. Create Pages</h6>
                            <p class="small text-muted">Add templates in <code>templates/pages/</code>:</p>
                            <pre class="bg-light p-3 rounded small"><code>&lt;!-- templates/pages/my-page.php --&gt;
&lt;h1&gt;&lt;?= e(getVar('page_title')) ?&gt;&lt;/h1&gt;
&lt;p&gt;Your content here&lt;/p&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="fas fa-tools me-2"></i>Helper Functions</h5>
                        </div>
                        <div class="card-body">
                            <h6>Template Helpers</h6>
                            <ul class="list-unstyled small">
                                <li><code>e($string)</code> - Escape HTML</li>
                                <li><code>url($route)</code> - Generate URLs</li>
                                <li><code>asset($file)</code> - Asset URLs</li>
                                <li><code>config($key)</code> - Get config values</li>
                                <li><code>partial($template)</code> - Include partials</li>
                            </ul>

                            <h6 class="mt-3">Asset Functions</h6>
                            <ul class="list-unstyled small">
                                <li><code>css('style.css')</code> - Include CSS</li>
                                <li><code>js('script.js')</code> - Include JS</li>
                                <li><code>img('photo.jpg', 'Alt text')</code> - Images</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Debug Mode & Environment Configuration -->
            <div class="row g-4 mb-5">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-warning text-white">
                            <h5 class="mb-0"><i class="fas fa-bug me-2"></i>Debug Mode & Environment</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>Current Environment Settings</h6>
                                    <div class="bg-light p-3 rounded">
                                        <table class="table table-sm table-borderless mb-0">
                                            <tr>
                                                <td><strong>Environment:</strong></td>
                                                <td><span class="badge bg-<?= ENVIRONMENT === 'development' ? 'warning' : (ENVIRONMENT === 'staging' ? 'info' : 'success') ?>"><?= e(ENVIRONMENT) ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Debug Mode:</strong></td>
                                                <td><span class="badge bg-<?= isDebug() ? 'danger' : 'success' ?>"><?= isDebug() ? 'Enabled' : 'Disabled' ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Error Reporting:</strong></td>
                                                <td><span class="badge bg-<?= error_reporting() === 0 ? 'success' : 'warning' ?>"><?= error_reporting() === 0 ? 'Hidden' : 'Visible' ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>PHP Version:</strong></td>
                                                <td><code><?= PHP_VERSION ?></code></td>
                                            </tr>
                                        </table>
                                    </div>

                                    <h6 class="mt-3">Debug Functions</h6>
                                    <ul class="list-unstyled small">
                                        <li><code>isDebug()</code> - Check debug status</li>
                                        <li><code>logMessage($msg, $level)</code> - Log messages</li>
                                        <li><code>executionTime()</code> - Get execution time</li>
                                        <li><code>ENVIRONMENT</code> - Current environment</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <h6>Enable/Disable Debug Mode</h6>
                                    <p class="small text-muted">Edit <code>config/config.php</code>:</p>
                                    <pre class="bg-light p-3 rounded small"><code>// Change environment
define('ENVIRONMENT', 'development'); // debug ON
define('ENVIRONMENT', 'production');  // debug OFF

// Or manually override
$config['app']['debug'] = true;  // Force enable
$config['app']['debug'] = false; // Force disable</code></pre>

                                    <h6 class="mt-3">Debug Information Panel</h6>
                                    <p class="small text-muted">When debug is enabled, you'll see:</p>
                                    <ul class="list-unstyled small">
                                        <li>• Current page/route information</li>
                                        <li>• Request URI and script details</li>
                                        <li>• Execution time in milliseconds</li>
                                        <li>• Memory usage statistics</li>
                                        <li>• Error reporting and logging</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Code Examples -->
            <div class="row g-4 mb-5">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0"><i class="fas fa-code me-2"></i>Code Examples</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>Including Assets</h6>
                                    <pre class="bg-light p-3 rounded small"><code>&lt;!-- CSS --&gt;
&lt;?= css('bootstrap.min.css') ?&gt;
&lt;?= css('custom.css') ?&gt;

&lt;!-- JavaScript --&gt;
&lt;?= js('jquery.min.js') ?&gt;
&lt;?= js('app.js') ?&gt;

&lt;!-- Images --&gt;
&lt;?= img('logo.png', 'Company Logo', ['class' => 'img-fluid']) ?&gt;</code></pre>
                                </div>
                                <div class="col-lg-6">
                                    <h6>Template Variables</h6>
                                    <pre class="bg-light p-3 rounded small"><code>&lt;!-- Set variables --&gt;
&lt;?php setVar('title', 'My Page') ?&gt;

&lt;!-- Use variables --&gt;
&lt;h1&gt;&lt;?= e(getVar('title')) ?&gt;&lt;/h1&gt;

&lt;!-- Generate URLs --&gt;
&lt;a href="&lt;?= url('about') ?&gt;"&gt;About&lt;/a&gt;
&lt;a href="&lt;?= url('contact') ?&gt;"&gt;Contact&lt;/a&gt;</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Advanced Configuration -->
            <div class="row g-4 mb-5">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="mb-0"><i class="fas fa-cogs me-2"></i>Advanced Configuration</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>Security Features</h6>
                                    <pre class="bg-light p-3 rounded small"><code>// CSRF Protection
&lt;?= csrfField() ?&gt; // in forms
csrfToken()        // get token

// Input Sanitization
post('name')       // sanitized POST data
get('search')      // sanitized GET data

// XSS Protection
e($userInput)      // escape output</code></pre>

                                    <h6 class="mt-3">Form Handling</h6>
                                    <pre class="bg-light p-3 rounded small"><code>if (isPost()) {
    $name = post('name');
    $email = post('email');
    // Process form...
}

// Check request method
if (isGet()) { /* handle GET */ }</code></pre>
                                </div>
                                <div class="col-lg-6">
                                    <h6>Routing & Navigation</h6>
                                    <pre class="bg-light p-3 rounded small"><code>// Check active route
activeClass('home', 'active')

// Current page info
currentRoute()     // get current route
currentPage()      // get current page

// Navigation
redirect('home')   // redirect to route
show404()         // show 404 page</code></pre>

                                    <h6 class="mt-3">Utilities</h6>
                                    <pre class="bg-light p-3 rounded small"><code>// Text manipulation
truncate($text, 150)      // truncate text
slug('My Page Title')     // generate slug

// Phone formatting
formatPhone($number)      // format phone

// Social features
whatsappButton()         // WhatsApp button
phoneButton()           // Phone button</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- File Structure Guide -->
            <div class="row g-4 mb-5">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-dark text-white">
                            <h5 class="mb-0"><i class="fas fa-folder me-2"></i>Framework Structure</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h6>Core Framework</h6>
                                    <pre class="bg-light p-3 rounded small text-muted"><code>├── app.php               # Application loader
├── index.php             # Entry point
├── classes/              # Core classes
│   ├── Core.php          # Main application
│   ├── Router.php        # URL routing
│   ├── Security.php      # Security features
│   ├── Template.php      # Template engine
│   └── Utilities.php     # Helper utilities
└── config/
    └── config.php        # Configuration</code></pre>
                                </div>
                                <div class="col-lg-4">
                                    <h6>Templates & Assets</h6>
                                    <pre class="bg-light p-3 rounded small text-muted"><code>├── templates/
│   ├── layout/           # Layout templates
│   │   ├── main.php      # Main layout
│   │   ├── header.php    # Header partial
│   │   └── footer.php    # Footer partial
│   ├── pages/            # Page templates
│   │   ├── home.php      # This page
│   │   ├── about.php     # About page
│   │   └── contact.php   # Contact page
│   └── errors/
│       └── 404.php       # Error pages</code></pre>
                                </div>
                                <div class="col-lg-4">
                                    <h6>Assets & Helpers</h6>
                                    <pre class="bg-light p-3 rounded small text-muted"><code>├── assets/
│   ├── css/              # Stylesheets
│   ├── js/               # JavaScript files
│   └── images/           # Image assets
├── includes/
│   ├── helpers.php       # Helper functions
│   ├── data.php          # Data management
│   └── data/             # Data files
└── logs/                 # Application logs
    └── YYYY-MM-DD.log</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Grid -->
            <div class="row g-4 mb-5">
                <div class="col-lg-3 col-md-6">
                    <div class="text-center p-3">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h6>Security First</h6>
                        <p class="small text-muted">XSS protection, CSRF tokens, input sanitization</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="text-center p-3">
                        <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h6>Responsive</h6>
                        <p class="small text-muted">Bootstrap-based mobile-first design</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="text-center p-3">
                        <div class="bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-search"></i>
                        </div>
                        <h6>SEO Ready</h6>
                        <p class="small text-muted">Meta tags, structured data, clean URLs</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="text-center p-3">
                        <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <h6>Fast & Light</h6>
                        <p class="small text-muted">Optimized routing, minimal overhead</p>
                    </div>
                </div>
            </div>

            <!-- Framework Status -->
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        <h6 class="alert-heading"><i class="fas fa-check-circle me-2"></i>Framework Status</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled mb-0">
                                    <li><i class="fas fa-check text-success me-2"></i>Core Framework: Active</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Security: Enabled</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Routing: <?= isDebug() ? 'Debug Mode' : 'Production Ready' ?></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled mb-0">
                                    <li><i class="fas fa-check text-success me-2"></i>Templates: Loaded</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Helpers: Available</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Environment: <?= e(ENVIRONMENT) ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Documentation Links -->
            <div class="text-center mt-4">
                <p class="text-muted">
                    <strong>Next Steps:</strong> 
                    Check the <code>README.md</code> file for complete documentation, 
                    or explore the <code>templates/</code> directory for examples.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Custom styles for the framework page -->
<style>
.card {
    transition: transform 0.2s ease-in-out;
}
.card:hover {
    transform: translateY(-2px);
}
pre {
    font-size: 0.8rem;
    line-height: 1.4;
}
code {
    color: #e83e8c;
    background-color: #f8f9fa;
    padding: 0.2rem 0.4rem;
    border-radius: 0.25rem;
}
pre code {
    color: #212529;
    background: transparent;
    padding: 0;
}
.alert ul li {
    margin-bottom: 0.25rem;
}
</style>
