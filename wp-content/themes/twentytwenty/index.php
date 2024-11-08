<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content">

	<?php if (have_posts()): ?>
		<div class="post-list">
			<?php while (have_posts()):
				the_post(); ?>
				<div class="post-item">
					<!-- <div class="post-image">
						<div class="post-thumbnail">
							<?php
							if (has_post_thumbnail()) {
								the_post_thumbnail('medium');
							} else {
								echo '<img src="' . get_template_directory_uri() . '/assets/images/default-thumbnail.jpg" alt="Default Thumbnail">';
							}
							?>
						</div>
					</div> -->
					<div class="post-date">
						<span class="day"><?php echo get_the_date('d'); ?></span>
						<span class="month"><?php echo get_the_date('F'); ?></span>
					</div>
					<div class="post-info">
						<h2 class="post-title">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h2>
						<p class="post-excerpt">
							<?php
							$excerpt = wp_strip_all_tags(get_the_excerpt());
							echo mb_strimwidth($excerpt, 0, 100, ' [...]');
							?>
						</p>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>

</main>
<style>
#site-content {
    margin-top: 10px;
}

.post-list {
  max-width: 700px;
    margin: 0 auto;
	background-color:#f7f7f7;

}

.post-item {
    display: flex;
    align-items: flex-start;
    padding: 16px;
    margin-bottom: 24px;
    background-color: #fff;
    font-family: Arial, sans-serif;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    max-width: 700px;
    margin: auto;
    margin-top: 15px;
	margin-bottom: 15px;
}

.post-date {
    width: 80px;
    text-align: center;
    margin-right: 16px;
    font-family: 'Arial', sans-serif;
    color: #333;
    padding-right: 16px;
    border-right: 1px solid #333;
	margin-top: -10px;
}

.post-date .day {
    font-size: 36px;
    font-weight: bold;
    color: #333;
}

.post-date .month {
    font-size: 12px;
    text-transform: uppercase;
    color: #777;
    margin-top: -8px;
}

.post-info {
    display: flex;
    flex-direction: column; /* Sắp xếp các phần tử theo chiều dọc */
}

.post-title {
    font-size: 18px;
    font-weight: bold;
    color: #0056b3;
    /* margin: 0 ;  */
	margin-left: -2px;
}

.post-title a {
    text-decoration: none;
    color: #0056b3;
}

.post-title a:hover {
    text-decoration: underline;
}

.post-excerpt {
    font-size: 14px;
    color: #666;
    margin: 0;
    line-height: 1.6;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .post-item {
        flex-direction: column;
        text-align: center;
    }

    .post-date {
        margin-right: 0;
        border-right: none;
        margin-bottom: 16px;
    }

    .post-info {
        text-align: center;
		/* text-align: left; */
    }
}


/* Tùy chỉnh tiêu đề của danh mục */


.wp-block-categories-list {
    background-color: #f9f9f9;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.wp-block-categories-list li {
    list-style: none;
    padding: 10px 0;
    border-bottom: 1px solid #ddd;
    font-weight: bold;
     color: #ff6347 !important; 
}
.wp-block-categories-list li a{
	 color:#98bfe1 !important;
}
.wp-block-categories-list li::before {
    content: "•";
    color: #ffd700; /* Màu vàng cho dấu chấm */
    font-size: 1.2em;
    margin-right: 8px;
}

.wp-block-categories-list li:last-child {
    border-bottom: none;
}


.widget-title {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    padding-bottom: 10px;
    border-bottom: 2px solid #ddd;
    margin-bottom: 15px;
}

/* Tùy chỉnh danh sách danh mục */
.widget_categories ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

/* Kiểu dáng của từng mục danh mục */
.widget_categories ul li {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

/* Biểu tượng tròn màu vàng trước mỗi danh mục */
.widget_categories ul li:before {
    content: '●';
    color: #f2b01e; /* Màu vàng */
    margin-right: 10px;
    font-size: 14px;
}

/* Kiểu dáng của liên kết danh mục */
.widget_categories ul li a {
    text-decoration: none;
    font-size: 16px;
    color: #333;
}

/* Đường kẻ dưới mỗi danh mục */
.widget_categories ul li:not(:last-child) {
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
}

</style>

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
