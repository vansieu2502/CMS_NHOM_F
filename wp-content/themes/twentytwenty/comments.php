<?php
/**
 * The template file for displaying the comments and comment form for the
 * Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}

if ($comments) {
	?>
	<div class="form-comment">


		<div class="comments" id="comments">
			<div class="comments-header section-inner small max-percentage">
				<h4>Comments</h4>
				<hr class="comments-divider">
			</div><!-- .comments-header -->

			<div class="comments content">
				<?php
				// Hiển thị chỉ nội dung bình luận
				wp_list_comments(
					array(
						'callback' => 'custom_comment_content_only', // Sử dụng callback để chỉ hiển thị nội dung
					)
				);
				?>
			</div><!-- .comments-inner -->

		</div><!-- comments -->

		<?php
}

function custom_comment_content_only($comment, $args, $depth)
{
	?>
		<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<div class="comment-content">
				<?php comment_text(); // Hiển thị nội dung bình luận ?>
			</div>
			<hr>
		</div>
		<?php
}
?>
</div>
<style>
	.form-comment {
		max-width: 65%;

	}

	.form-comment .comments {
		padding-top: 0 !important;


	}

	.comments-divider {
		border: none;
		border-top: 2px solid #000;
		width: 100px;
		margin: 1px auto;
		margin-left: 0;
	}

	.max-percentage {
		margin-left: 200px;
	}

	.max-percentage h4 {
		font-size: 30px;


	}

	.comments .content {


		height: auto;

		color: #3188d4;
		font-size: 1.8em;
		margin-left: 200px;
		padding-top: 2rem !important;

	}

	.max-percentage h4 {
		font-size: 30px;
		margin-bottom: 5px !important;

	}

	.comment-content {
		margin-top: -5rem !important;
		/* Loại bỏ khoảng cách trên mỗi bình luận */
		margin-bottom: -10px !important;
		/* Giảm khoảng cách dưới mỗi bình luận */
		padding-bottom: -15px !important;
		/* Giảm khoảng cách dưới mỗi bình luận */
		padding-top: -5rem !important;

	}
</style>