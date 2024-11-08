<?php

/**
 * Displays the menus and widgets at the end of the main element.
 * Visually, this output is presented as part of the footer element.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$has_footer_menu = has_nav_menu('footer');
$has_social_menu = has_nav_menu('social');

$has_sidebar_1 = is_active_sidebar('sidebar-1');
$has_sidebar_2 = is_active_sidebar('sidebar-2');

// Only output the container if there are elements to display.
if ($has_footer_menu || $has_social_menu || $has_sidebar_1 || $has_sidebar_2) {
?>

	<div class="footer-nav-widgets-wrapper header-footer-group">

		<div class="footer-inner section-inner">

			<?php

			$footer_top_classes = '';

			$footer_top_classes .= $has_footer_menu ? ' has-footer-menu' : '';
			$footer_top_classes .= $has_social_menu ? ' has-social-menu' : '';

			if ($has_footer_menu || $has_social_menu) {
			?>
				<div class="footer-top<?php echo $footer_top_classes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output 
										?>">
					<?php if ($has_footer_menu) { ?>

						<nav aria-label="<?php esc_attr_e('Footer', 'twentytwenty'); ?>" class="footer-menu-wrapper">

							<ul class="footer-menu reset-list-style">
								<?php
								wp_nav_menu(
									array(
										'container'      => '',
										'depth'          => 1,
										'items_wrap'     => '%3$s',
										'theme_location' => 'footer',
									)
								);
								?>
							</ul>

						</nav><!-- .site-nav -->

					<?php } ?>
					<?php if ($has_social_menu) { ?>

						<nav aria-label="<?php esc_attr_e('Social links', 'twentytwenty'); ?>" class="footer-social-wrapper">

							<ul class="social-menu footer-social reset-list-style social-icons fill-children-current-color">

								<?php
								wp_nav_menu(
									array(
										'theme_location'  => 'social',
										'container'       => '',
										'container_class' => '',
										'items_wrap'      => '%3$s',
										'menu_id'         => '',
										'menu_class'      => '',
										'depth'           => 1,
										'link_before'     => '<span class="screen-reader-text">',
										'link_after'      => '</span>',
										'fallback_cb'     => '',
									)
								);
								?>

							</ul><!-- .footer-social -->

						</nav><!-- .footer-social-wrapper -->

					<?php } ?>
				</div><!-- .footer-top -->

			<?php } ?>

			<?php if ($has_sidebar_1 || $has_sidebar_2) { ?>

				<aside class="footer-widgets-outer-wrapper">

					<div class="footer-widgets-wrapper">

						<?php if ($has_sidebar_1) { ?>

							<div class="footer-widgets column-one grid-item">
								<?php dynamic_sidebar('sidebar-1'); ?>
							</div>

						<?php } ?>

						<?php if ($has_sidebar_2) { ?>

							<div class="footer-widgets column-two grid-item">
								<?php dynamic_sidebar('sidebar-2'); ?>
							</div>

						<?php } ?>

					</div><!-- .footer-widgets-wrapper -->

				</aside><!-- .footer-widgets-outer-wrapper -->

			<?php } ?>

		</div><!-- .footer-inner -->
		<div class="container mt-5 mb-5">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<h4>Latest News</h4>
					<ul class="custom-timeline">

						<?php
						// Query to get the latest posts
						$args = array(
							'posts_per_page' => 3, // Number of latest posts to display
							'post_status'    => 'publish', // Only published posts
						);

						$latest_posts = new WP_Query($args);

						// Check if we have posts
						if ($latest_posts->have_posts()) :
							// Loop through the posts
							while ($latest_posts->have_posts()) : $latest_posts->the_post();
						?>
								<li>
									<div class="custom-post-info">
										<a href="<?php the_permalink(); ?>" target="_blank" class="custom-post-title"><?php the_title(); ?></a>
										<a href="#" class="custom-post-date float-right"><?php echo get_the_date(); ?></a>
									</div>
									<p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
								</li>
						<?php
							endwhile;
						endif;

						// Reset post data
						wp_reset_postdata();
						?>

					</ul>
				</div>
			</div>
		</div>
	</div><!-- .footer-nav-widgets-wrapper -->

<?php
}
