<?php

/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$class = '';
if (is_single()) {
	$class = 'danh-sach';
}
?>

<style>
	/* Bố cục container của danh sách bài viết */
	.post-list {
		display: flex;
		flex-direction: column;
		gap: 20px;
		margin: 0 auto;
		width: 80%;
	}

	/* Bố cục của từng bài viết */
	.post-item {
		position: relative;
		display: flex;
		flex-direction: column;
		background-color: #f7f7f7;
		padding: 20px;
		border-radius: 8px;
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		font-family: Arial, sans-serif;
		/* max-width: 1000px;
		margin: 0 auto; */
	}

	/* Container bao quanh tiêu đề và ngày tháng */
	.post-header {
		display: flex;
		justify-content: space-between;
		align-items: center;
		/* Canh giữa các phần tử theo chiều dọc */
	}

	/* Định dạng tiêu đề */
	.post-title {
		font-size: 24px;
		margin: 0;
		color: #333;
		font-weight: bold;
	}

	/* Định dạng ngày tháng */
	.post-date {
		display: flex;
		align-items: center;
		justify-content: center;
		font-size: 16px;
		position: relative;
		width: 80px;
		height: 80px;
		background-color: #f4c542;
		border-radius: 50%;
		color: white;
		padding: 10px;
		box-sizing: border-box;
		margin-left: auto;
		transform: none;
		/* Xóa transform để không bị dịch chuyển */
	}

	/* Bọc ngày và tháng lại trong một khối */
	.post-date .day-month {
		display: inline-block;
		font-size: 20px;
		font-weight: bold;
		line-height: 1;
		text-align: center;
		color: black !important;
	}

	/* Phần ngày */
	.post-date .day {
		display: block;
		font-size: 18px;
		/* Kích thước lớn hơn cho ngày */
		margin-bottom: -4px;
		/* Điều chỉnh khoảng cách */
		border-bottom: 1px solid gray;
		/* Tạo đường dưới để phân biệt */
		padding-bottom: 5px;
		font-weight: 100 !important;
	}

	/* Phần tháng */
	.post-date .month {
		display: block;
		font-size: 15px;
		/* Kích thước nhỏ hơn cho tháng */
		padding-top: 5px;
		font-weight: 100 !important;
	}

	/* Phần năm */
	.post-date .year {
		font-size: 15px;
		/* Kích thước nhỏ hơn cho năm */
		color: black;
		/* Màu chữ cho năm */
		margin-left: 5px;
		/* Khoảng cách giữa ngày/tháng và năm */
		font-weight: bold;
	}


	/* Tiêu đề và nội dung */
	.post-info {
		margin-top: 30px;
	}

	.post-title {
		font-size: 24px;
		margin: 0;
		color: #333;
		font-weight: bold;
	}

	.post-title a {
		text-decoration: none;
		color: inherit;
	}

	.post-title a:hover {
		text-decoration: underline;
	}

	.post-excerpt {
		font-size: 16px;
		color: #555;
		margin-top: 10px;
		line-height: 1.6;
		font-style: italic;
	}

	/* Responsive: Bố cục dọc trên thiết bị nhỏ */
	@media (max-width: 768px) {
		.post-item {
			flex-direction: column;
		}

		.post-date {
			top: 10px;
			right: 10px;
			width: 50px;
			height: 50px;
		}

		.post-date .day {
			font-size: 18px;
		}

		.post-date .month {
			font-size: 10px;
		}


	}
</style>

<article <?php post_class('post-item'); ?> id="post-<?php the_ID(); ?>">

	<?php

	if (is_singular()) {
		the_title('<h1 class="entry-title mx-auto ">', '</h1>');
	} else {
		the_title('<h2 class="entry-title mx-auto  heading-size-1"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>');
	}

	if (! is_search()) {
		get_template_part('template-parts/featured-image');
	}

	?>

	<?php if (is_single()) :

		if (is_singular()) {
			the_title('<h1 class="entry-title mx-auto ">', '</h1>');
		} else {
			the_title('<h2 class="entry-title mx-auto  heading-size-1"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>');
		}

		if (! is_search()) {
			get_template_part('template-parts/featured-image');
		} ?>
		<!-- Hiển thị ngày tháng cho bài viết đơn -->

		<div class="post-date">
			<div class="day-month">
				<div class="day"><?php echo get_the_date('d'); ?></div>
				<div class="month"><?php echo get_the_date('m'); ?></div> <!-- Thay đổi định dạng thành m/d/Y -->
			</div>
			<span class="year"><?php echo get_the_date('y'); ?></span>
		</div>

	<?php endif; ?>
	<!-- Đoạn mã HTML cho đường kẽ -->
	<div class="custom-divider"></div>



	<div class="post-inner <?php echo is_page_template('templates/template-full-width.php') ? '' : 'thin'; ?>">

		<div class="entry-content">

			<?php
			// Kiểm tra xem có phải là tìm kiếm hoặc hiển thị đoạn trích hay không
			if (is_search() || ! is_singular() && 'summary' === get_theme_mod('blog_content', 'full')) {
				// Hiển thị đoạn trích bài viết
				the_excerpt();
			} else {
				// Nếu là trang đơn (single), hiển thị nội dung đầy đủ
				if (is_single()) {
					// Hiển thị nội dung bài viết với tùy chọn "Tiếp tục đọc"
					the_content(__('Continue reading', 'twentytwenty'));
				} else {
					// Nếu không phải trang đơn, hiển thị 100 ký tự đầu tiên của nội dung
					$post = get_post();
					echo substr($post->post_content, 0, 100) . ' [...]';
				}
			}
			?>

		</div><!-- .entry-content -->

	</div><!-- .post-inner -->

	<div class="section-inner">
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__('Page', 'twentytwenty') . '"><span class="label">' . __('Pages:', 'twentytwenty') . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		edit_post_link();

		// Single bottom post meta.
		twentytwenty_the_post_meta(get_the_ID(), 'single-bottom');

		if (post_type_supports(get_post_type(get_the_ID()), 'author') && is_single()) {

			get_template_part('template-parts/entry-author-bio');
		}
		?>

	</div><!-- .section-inner -->

	<?php

	if (is_single()) {

		get_template_part('template-parts/navigation');
	}

	/*
	 * Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 */
	if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && ! post_password_required()) {
	?>

		<div class="comments-wrapper section-inner">

			<?php
			// comments_template();
			?>

		</div>
		<!-- .comments-wrapper -->

	<?php
	}
	?>