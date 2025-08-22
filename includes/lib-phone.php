<?php
/**
 * Legacy phone button functions for backward compatibility
 * 
 * @author Amigo Dheena
 * @version 1.0
 * @deprecated Use the Utilities class methods instead
 */

// Prevent direct access
if (!defined('TEMPLATE_VERSION')) {
    die('Direct access not permitted');
}

/**
 * Legacy phone button function
 * 
 * @deprecated Use phoneButton() helper function instead
 * @param array|string $phone
 * @return string
 */
function getPhoneButton($phone) 
{
    // Use the new utility function
    global $utils;
    return $utils->getPhoneButton($phone);
}