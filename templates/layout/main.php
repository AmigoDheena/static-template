<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?= e(config('app.charset', 'UTF-8')) ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title><?= e(getVar('meta_title', pageTitle())) ?></title>
    <?= metaDescription(getVar('page_description', '')) ?>
    <?= getVar('author_meta', '') ?>
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= e(url(currentRoute())) ?>">
    <meta property="og:title" content="<?= e(getVar('meta_title', pageTitle())) ?>">
    <meta property="og:description" content="<?= e(getVar('page_description', '')) ?>">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= e(url(currentRoute())) ?>">
    <meta property="twitter:title" content="<?= e(getVar('meta_title', pageTitle())) ?>">
    <meta property="twitter:description" content="<?= e(getVar('page_description', '')) ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= asset('favicon.ico') ?>">
    
    <!-- CSS -->
    <?= css('bootstrap.min.css') ?>
    <?= css('main.css') ?>
    
    <!-- Custom CSS for this page -->
    <?php if (getVar('custom_css')): ?>
        <style><?= getVar('custom_css') ?></style>
    <?php endif; ?>
    
    <!-- JSON-LD Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "<?= e(config('site.company_name')) ?>",
        "url": "<?= e(url()) ?>",
        "telephone": "<?= e(config('contact.phones.0')) ?>",
        "email": "<?= e(config('contact.email')) ?>",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "<?= e(config('contact.address.full')) ?>"
        }
    }
    </script>
</head>
<body class="<?= e(getVar('body_class', '')) ?>">
    <!-- Skip to main content for accessibility -->
    <!-- <a class="sr-only sr-only-focusable" href="#main-content">Skip to main content</a> -->
    
    <?php //partial('layout/header') ?>
    
    <main id="main-content" role="main">
        <?= $content ?? '' ?>
    </main>
    
    <?php //partial('layout/footer') ?>
    
    <!-- Floating buttons -->
    <?php if (config('features.whatsapp_button')): ?>
        <?= whatsappButton() ?>
    <?php endif; ?>
    
    <?php if (config('features.phone_button')): ?>
        <?= phoneButton() ?>
    <?php endif; ?>
    
    <!-- JavaScript -->
    <?= js('bootstrap.bundle.min.js') ?>
    <?= js('main.js') ?>
    
    <!-- Custom JavaScript for this page -->
    <?php if (getVar('custom_js')): ?>
        <script><?= getVar('custom_js') ?></script>
    <?php endif; ?>
    
    <?php if (isDebug()): ?>
        <!-- Debug information -->
        <div id="debug-info" style="position: fixed; bottom: 10px; left: 10px; background: rgba(0,0,0,0.8); color: white; padding: 10px; font-size: 12px; border-radius: 4px; z-index: 9999; max-width: 300px;">
            <strong>Debug Info:</strong><br>
            Page: <?= e(currentPage()) ?><br>
            Route: <?= e(currentRoute()) ?><br>
            Request URI: <?= e($_SERVER['REQUEST_URI']) ?><br>
            Script Name: <?= e($_SERVER['SCRIPT_NAME']) ?><br>
            Base Path: <?= e(dirname($_SERVER['SCRIPT_NAME'])) ?><br>
            Execution Time: <?= number_format(executionTime() * 1000, 2) ?>ms<br>
            Memory Usage: <?= formatFileSize(memory_get_peak_usage(true)) ?>
        </div>
    <?php endif; ?>
</body>
</html>
