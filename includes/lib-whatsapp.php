<?php
/**
 * Legacy WhatsApp button functions for backward compatibility
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
 * Legacy WhatsApp button function
 * 
 * @deprecated Use whatsappButton() helper function instead
 * @param array|string $phone
 * @return string
 */
function getWhatsAppButton($phone) 
{
    // Use the new utility function
    global $utils;
    return $utils->getWhatsAppButton($phone);
}