<?php
/**
 * Search form template
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$unique_id = wp_unique_id('search-form-');

$aria_label = !empty($args['aria_label']) ? 'aria-label="' . esc_attr($args['aria_label']) . '"' : '';
?>
<form role="search" <?php echo $aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?>
      method="get" class="search-form" action="<?php echo esc_attr(home_url('/')); ?>">
    <div class="input-group">
        <input type="search" id="<?php echo esc_attr($unique_id); ?>" class="search-field form-control me-3"
               value="<?php echo esc_attr(get_search_query()); ?>" name="s" placeholder="<?php _e('Search in site...', 'hello-mobili'); ?>"/>
        <input type="submit" class="btn btn-primary search-submit"
               value="<?php echo esc_attr_x('Search', 'submit button', 'hello-mobili'); ?>"/>
    </div>
</form>
