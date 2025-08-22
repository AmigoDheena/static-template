<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static Site Template - URL Testing</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 50px auto; padding: 20px; }
        .method { margin: 20px 0; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .success { background-color: #d4edda; border-color: #c3e6cb; }
        .error { background-color: #f8d7da; border-color: #f5c6cb; }
        ul { list-style-type: none; padding: 0; }
        li { margin: 10px 0; }
        a { display: inline-block; padding: 10px 15px; background: #007bff; color: white; text-decoration: none; border-radius: 3px; }
        a:hover { background: #0056b3; }
        .info { background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 20px 0; }
    </style>
</head>
<body>
    <h1>Static Site Template - URL Testing</h1>
    
    <div class="info">
        <strong>Current Status:</strong><br>
        If you can see this page, basic routing is working!<br>
        <strong>Test URL:</strong> <code>http://localhost/cp/static-template/url-test</code>
    </div>
    
    <div class="method">
        <h2>Method 1: Clean URLs (Requires .htaccess)</h2>
        <p>These URLs require Apache mod_rewrite and the .htaccess file to work:</p>
        <ul>
            <li><a href="/cp/static-template/">Home</a></li>
            <li><a href="/cp/static-template/about">About</a></li>
            <li><a href="/cp/static-template/services">Services</a></li>
            <li><a href="/cp/static-template/contact">Contact</a></li>
            <li><a href="/cp/static-template/wedding-photography">Wedding Photography</a></li>
        </ul>
    </div>
    
    <div class="method">
        <h2>Method 2: Query Parameter URLs (Always Works)</h2>
        <p>These URLs will work even without .htaccess:</p>
        <ul>
            <li><a href="/cp/static-template/index-query.php">Home</a></li>
            <li><a href="/cp/static-template/index-query.php?page=about">About</a></li>
            <li><a href="/cp/static-template/index-query.php?page=services">Services</a></li>
            <li><a href="/cp/static-template/index-query.php?page=contact">Contact</a></li>
            <li><a href="/cp/static-template/index-query.php?page=wedding-photography">Wedding Photography</a></li>
        </ul>
    </div>
    
    <div class="info">
        <h3>Troubleshooting:</h3>
        <ol>
            <li><strong>If Method 1 doesn't work:</strong> Your Apache might not have mod_rewrite enabled or .htaccess files might be disabled.</li>
            <li><strong>Use Method 2 as fallback:</strong> The query parameter method will always work.</li>
            <li><strong>Check XAMPP settings:</strong> Make sure mod_rewrite is enabled in your Apache configuration.</li>
            <li><strong>Check .htaccess:</strong> Make sure the .htaccess file exists and has proper permissions.</li>
        </ol>
    </div>
    
    <div class="info">
        <h3>For Production:</h3>
        <p>You can modify the Router class to automatically detect which method to use, or configure your server to properly handle clean URLs.</p>
    </div>
</body>
</html>
