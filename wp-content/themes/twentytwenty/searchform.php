<?php

/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$twentytwenty_unique_id = twentytwenty_unique_id('search-form-');

$twentytwenty_aria_label = ! empty($args['aria_label']) ? 'aria-label="' . esc_attr($args['aria_label']) . '"' : '';
// Backward compatibility, in case a child theme template uses a `label` argument.
if (empty($twentytwenty_aria_label) && ! empty($args['label'])) {
	$twentytwenty_aria_label = 'aria-label="' . esc_attr($args['label']) . '"';
}
?>
<div class="search-active search-show" style="background-color: white; ">
	<form role="search" <?php echo $twentytwenty_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. 
						?> method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">

		<label for="<?php echo esc_attr($twentytwenty_unique_id); ?>">
			<i class='fas fa-search search-icon'></i>
			<span class="screen-reader-text">
				<?php
				/* translators: Hidden accessibility text. */
				_e('Search for:', 'twentytwenty'); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations
				?>
			</span>
			<input type="search" id="<?php echo esc_attr($twentytwenty_unique_id); ?>" class="search-field search-input" placeholder="<?php echo esc_attr_x('Search topics or keywords', 'placeholder', 'twentytwenty'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		</label>
		<input type="submit" class="search-submit btn-search" value="<?php echo esc_attr_x('Search', 'submit button', 'twentytwenty'); ?>" />
	</form>
</div>