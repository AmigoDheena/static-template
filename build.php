<?php
/**
 * Minimal PHP to HTML Converter
 * 
 * This script uses the PHP built-in web server to serve the PHP files
 * and then uses curl to fetch the rendered HTML content.
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Minimal PHP to HTML Converter Starting...\n";

// Create a build directory if it doesn't exist
$buildDir = __DIR__ . '/build';
if (!is_dir($buildDir)) {
    mkdir($buildDir, 0755, true);
    echo "Created build directory.\n";
}

// Function to convert PHP URL to HTML file
function convertUrl($phpFile, $htmlFile) {
    global $buildDir;
    
    echo "Converting: $phpFile to " . basename($htmlFile) . "\n";
    
    // Start a local PHP server in the background
    $port = rand(8000, 9000);
    $serverRoot = __DIR__;
    $serverCommand = "php -S localhost:{$port} -t " . escapeshellarg($serverRoot);
    
    // Start the server
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        pclose(popen("start /B " . $serverCommand, "r"));
    } else {
        exec($serverCommand . " > /dev/null 2>&1 & echo $!", $output);
    }
    
    // Give the server time to start
    sleep(2);
    
    // Use cURL to fetch the PHP file
    $ch = curl_init("http://localhost:{$port}/" . $phpFile);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    $html = curl_exec($ch);
    curl_close($ch);
    
    // Kill the PHP server (Windows and non-Windows)
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        exec("taskkill /F /IM php.exe /FI \"WINDOWTITLE eq {$serverCommand}\"");
    } else {
        exec("pkill -f '{$serverCommand}'");
    }
    
    // Convert PHP links to HTML
    $html = preg_replace('/href=[\'"]\/([\w-]+)\.php[\'"]/', 'href="$1.html"', $html);
    $html = preg_replace('/href=[\'"]([\w-]+)\.php[\'"]/', 'href="$1.html"', $html);
    
    // Save the HTML file
    if (!empty($html)) {
        file_put_contents($htmlFile, $html);
        echo "✅ Generated " . basename($htmlFile) . "\n";
        return true;
    } else {
        echo "⚠️ Empty content for " . basename($phpFile) . ", skipping\n";
        return false;
    }
}

// Find all PHP files
$phpFiles = array(
    'index.php' => $buildDir . '/index.html',
);

// If template.php exists and has content, add it
if (file_exists(__DIR__ . '/template.php') && filesize(__DIR__ . '/template.php') > 0) {
    $phpFiles['template.php'] = $buildDir . '/template.html';
}

// Add all service files
include_once(__DIR__ . '/includes/lib-services.php');
if (isset($services) && !empty($services)) {
    foreach ($services as $serviceFile => $serviceData) {
        $phpFiles[$serviceFile] = $buildDir . '/' . $serviceData['Slug'] . '.html';
    }
}

// If there are other PHP files, add them
$otherPhpFiles = glob(__DIR__ . '/*.php');
foreach ($otherPhpFiles as $phpFile) {
    $filename = basename($phpFile);
    // Skip already added files and build scripts
    if (array_key_exists($filename, $phpFiles) || 
        strpos($filename, 'build') !== false || 
        strpos($filename, 'php2html') !== false) {
        continue;
    }
    
    $phpFiles[$filename] = $buildDir . '/' . str_replace('.php', '.html', $filename);
}

// Convert all PHP files to HTML
foreach ($phpFiles as $phpFile => $htmlFile) {
    convertUrl($phpFile, $htmlFile);
}

// Copy assets
echo "Copying assets...\n";
$assetDirs = array('css', 'js', 'images', 'assets', 'img', 'fonts');
foreach ($assetDirs as $dir) {
    $sourceDir = __DIR__ . '/' . $dir;
    if (is_dir($sourceDir)) {
        $destDir = $buildDir . '/' . $dir;
        
        // Create the destination directory if it doesn't exist
        if (!is_dir($destDir)) {
            mkdir($destDir, 0755, true);
        }
        
        // Copy all files recursively
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($sourceDir, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::SELF_FIRST
        );
        
        foreach ($iterator as $item) {
            if ($item->isDir()) {
                mkdir($destDir . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
            } else {
                copy($item, $destDir . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
                echo "Copied asset: " . $iterator->getSubPathName() . "\n";
            }
        }
    }
}

echo "\nBuild completed successfully! Static HTML files are in the /build directory.\n";
?>
