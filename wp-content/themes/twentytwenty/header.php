<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$enable_header_search = get_theme_mod('enable_header_search', true); // Add this line

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/module1.css" type="text/css">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="stylesheet" id="custom-archive-widget-style-css"
		href="http://yourdomain.com/wp-content/themes/twentytwenty/custom-archives-widget.css" type="text/css"
		media="all">
	<link rel="stylesheet" id="custom-widget-pages-style-css"
		href="http://yourdomain.com/wp-content/themes/twentytwenty/custom-widget-pages.css" type="text/css" media="all">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<?php
	wp_body_open();
	?>

	<header id="site-header" class="header-footer-group">

		<div class="container-fluid">
			<div class="row align-items-center py-3">

				<!-- Site Logo -->
				<!-- Site Logo and Home Link -->
				<div class="col-md-2 d-flex align-items-center justify-content-between">
					<div>
						<?php
						twentytwenty_site_logo();
						twentytwenty_site_description();
						?>
					</div>
					<div>
						<a href="<?php echo esc_url(get_home_url()); ?>" class="nav-link">Home</a>
					</div>
				</div>

				<!-- Search Form -->
				<div class="col-md-4">
					<form class="form-inline my-2 my-lg-0" method="get" action="<?php echo esc_url(home_url('/')); ?>"
						role="search" aria-label="<?php esc_attr_e('Search', 'text-domain'); ?>">
						<input class="search-input form-control mr-sm-2" type="search"
							placeholder="<?php esc_attr_e('Search', 'text-domain'); ?>" name="s"
							aria-label="<?php esc_attr_e('Search', 'text-domain'); ?>">
						<button class="btn-search btn btn-outline-success my-2 my-sm-0"
							type="submit"><?php esc_html_e('Search', 'text-domain'); ?></button>
					</form>
				</div>
				<!-- Navigation Links -->
				<div class="col-md-4">
					<nav class="nav">
						<?php
						// Display the list of categories with custom classes
						wp_list_categories([
							'title_li' => '',  // Remove the default title
							'style' => 'list', // Use list format for categories
							'separator' => '', // Add a separator for navigation links if needed
							'walker' => new Walker_Category_Nav_Link() // Custom walker for <a> and 'nav-link' class
						]);
						?>
					</nav>
				</div>

				<?php
				class Walker_Category_Nav_Link extends Walker_Category
				{
					function start_el(&$output, $category, $depth = 0, $args = [], $id = 0)
					{
						$cat_name = esc_attr($category->name);
						$cat_link = esc_url(get_category_link($category->term_id));

						$output .= "<a class='nav-link' href='{$cat_link}'>{$cat_name}</a>";
					}
				}
				?>

				<!-- User Account Dropdown -->
				<div class="col-md-2 text-center">

					<!-- User Account Dropdown -->
					<div class="dropdown">
						<a href="#" class="nav-link dropdown-toggle" id="accountDropdown" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">
							<span class="user-icon"><i class="fa fa-2x fa-user-circle"></i></span>
							<span><?php esc_html_e('Account', 'text-domain'); ?></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="accountDropdown">
							<a class="dropdown-item" href="#">Profile</a>
							<a class="dropdown-item" href="#">Settings</a>
							<a class="dropdown-item" href="#">Logout</a>
						</div>
					</div>
					<!-- End of User Account Dropdown -->

				</div>
			</div>
		</div>

		<?php
		// Output the search modal (if it is activated in the customizer).
		if ($enable_header_search) {
			get_template_part('template-parts/modal-search');
		}
		?>

	</header><!-- #site-header -->

	<?php
	// Output the menu modal.
	get_template_part('template-parts/modal-menu');
