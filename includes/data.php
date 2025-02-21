<?php

include 'lib-whatsapp.php';
include 'lib-phone.php';
include 'lib-social-media.php';
include 'lib-menu.php';
include 'lib-services.php';

define('BASE_URL', '#');

# Basic Details
$company = "Company_name";
$phone = ['9876543210','1234567890'];
$email = "admin@email.com";
$address = "254 Street Avenue, Los Angeles, LA 2415 US";
$address_short =  "Los Angeles, LA 2415 US";
$year = date('Y');
$footer_credit = '© Copyright '. $year ." " .  $company . ' | Developed by <a class="text-white" href="https://clickplus.co.in" title="ClickPlus Solutions" rel="dofollow">ClickPlus Solutions</a>';
$author = '<meta name="author" content="Amigo Dheena">';

// Get the WhatsApp button
$whatsapp = getWhatsAppButton($phone);
$phonenum = getPhoneButton($phone);

# Includes
$Header = "includes/header.php";
$Footer = "includes/footer.php";

// Page
// Get the requested page from the URL
$request_uri = $_SERVER['REQUEST_URI'];
$parts = explode('/', $request_uri);
$page = end($parts);


// Check if the requested page exists in the pages array
if (array_key_exists($page, $services)) {
    // Get the content for the requested page
    $pageTitle = $services[$page][0];
    $img = $services[$page][1];
    $pageContent = $services[$page][3];

    // Include the template to display the content
    include './template.php';
} 

?>