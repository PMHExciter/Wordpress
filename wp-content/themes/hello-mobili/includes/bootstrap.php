<?php
/**
 * Theme includes loader
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

// Load hooks.
require_once __DIR__ . '/hooks/enqueue.php';
require_once __DIR__ . '/hooks/general.php';
require_once __DIR__ . '/hooks/woocommerce.php';
require_once __DIR__ . '/hooks/recommends.php';

// Load classes.
require_once __DIR__ . '/classes/Walker_Comment.php';

// Load functions.
require_once __DIR__ . '/functions/optimized.php';
require_once __DIR__ . '/functions/templates.php';