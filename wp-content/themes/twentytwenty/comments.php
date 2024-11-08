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
if ( post_password_required() ) {
	return;
}

if ( $comments ) {
	?>

<div class="form-comment1">


<div class="comments1" id="comments">
	<div class="comments-header section-inner small max-percentage">
		<h4>Comments</h4>
		<hr class="comments-divider">
	</div><!-- .comments-header -->

	<div class="comments content1">
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
</div>
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

if (comments_open() || pings_open()) {
	if ($comments) {
		echo '<hr class="styled-separator is-style-wide" aria-hidden="true" />';
	}
?>

	<!-- Custom Post Form Begins -->
	<section class="card1">
		<div class="card-body1">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
					<div class="form-group">
						<label class="sr-only1" for="comment">Make a Post</label>
						<div class="form-area1">
							<?php
							// Custom Comment Form Fields
							comment_form(
								array(
									'title_reply' => '', // Remove title	
									'comment_field' => '<textarea id="comment" name="comment" class="form-control" rows="3" placeholder="What are you thinking..."></textarea>',
									'submit_button' => '<div class="text-right1"><button type="submit" class="btn1 btn-primary1">Share</button></div>',
									'class_form' => '', // Remove WordPress default form class
									'logged_in_as' => '', // Loại bỏ dòng "Logged in as..."
									'title_reply_before' => '',
									'title_reply_after' => '</h2>',
								)
							);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Custom Post Form Ends -->

<?php
} elseif (is_single()) {
	if ($comments) {
		echo '<hr class="styled-separator is-style-wide" aria-hidden="true" />';
	}
?>
	<div class="comment-respond" id="respond">
		<p class="comments-closed"><?php _e('Comments are closed.', 'twentytwenty'); ?></p>
	</div>
<?php
}
?>



<style>
	.card1 {
		margin: 0;
		padding: 0;
		background-color: #F7F7F7;
		border-radius: 5px;
		border: 1px solid #D4D4D4;
	}


	.card-body1 {
		padding: 20px 0;
	}

	.sr-only1 {
		border: 1px solid #D4D4D4;
		border-bottom: none;
		width: max-content;
		padding: 10px;
		margin-left: 30px;
		margin-bottom: 0;
		background-color: #fff;
		border-radius: 4px 4px 0 0;
		transform: translateY(1px);
	}


	.form-area1 {
		border-top: 1px solid #D4D4D4;
		border-bottom: 1px solid #D4D4D4;
		width: 100%;
		background-color: #fff;
		padding: 30px;
	}

	.text-right1 {
		display: flex;
		justify-content: end;
	}

	.btn1 {
		margin-top: 20px;
		padding: 1rem 1.5rem;
		border-radius: 0.25rem;
		border: none;
		transition: background-color 0.2s;
		text-transform: lowercase;
		text-decoration: none;

	}

	.btn-primary1 {
		background-color: #007bff;
		color: white;
	}

	.btn-primary1:hover {
		background-color: #0056b3;
		text-decoration: none;
	}






/* sieu */
	.form-comment1 {
		max-width: 65%;

	}

	.form-comment .comments1 {
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

	.comments1 .content1 {

		
		height: auto;

		color: #3188d4;
		font-size: 1.8em;
		margin-left: 215px;
		padding-top: 2rem !important;

	}

	.max-percentage h4 {
		font-size: 30px;
		

	}

	.comment-content {
		margin-top: -5rem !important;
	
		

	}
</style>

