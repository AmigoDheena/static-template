<?php
/**
 * Legacy display file for backward compatibility
 * 
 * @author Amigo Dheena
 * @version 1.0
 * @deprecated This file is kept for backward compatibility. Use index.php instead.
 */

// Redirect to index.php for proper handling
header('Location: index.php' . (isset($_GET['page']) ? '?page=' . urlencode($_GET['page']) : ''));
exit;