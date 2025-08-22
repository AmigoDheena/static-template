<?php
/**
 * Simple routing test to verify URL rewriting
 * Access this via: http://localhost/cp/static-template/test-routing
 */

echo "<h1>Routing Test</h1>";
echo "<p><strong>Success!</strong> URL rewriting is working correctly.</p>";
echo "<p>Request URI: " . htmlspecialchars($_SERVER['REQUEST_URI']) . "</p>";
echo "<p>Script Name: " . htmlspecialchars($_SERVER['SCRIPT_NAME']) . "</p>";
echo "<p>Query String: " . htmlspecialchars($_SERVER['QUERY_STRING'] ?? '') . "</p>";

echo "<h2>Test URLs:</h2>";
echo "<ul>";
echo "<li><a href='/cp/static-template/'>Home</a></li>";
echo "<li><a href='/cp/static-template/about'>About</a></li>";
echo "<li><a href='/cp/static-template/services'>Services</a></li>";
echo "<li><a href='/cp/static-template/contact'>Contact</a></li>";
echo "<li><a href='/cp/static-template/wedding-photography'>Wedding Photography</a></li>";
echo "</ul>";
?>
