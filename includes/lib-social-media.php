<?php
/**
 * Legacy social media variables for backward compatibility
 * 
 * @author Amigo Dheena
 * @version 1.0
 * @deprecated Use the config system instead
 */

// Prevent direct access
if (!defined('TEMPLATE_VERSION')) {
    die('Direct access not permitted');
}

// Legacy variables for backward compatibility
$facebook = config('social_media.facebook', '#');
$twitter = config('social_media.twitter', '#');
$instagram = config('social_media.instagram', '#');
$linkedin = config('social_media.linkedin', '#');
$youtube = config('social_media.youtube', '#');