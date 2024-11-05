<?php
// If the current post is protected by a password and the visitor has not yet entered the password, return early without loading the comments.
if (post_password_required()) {
	return;
}

if ($comments) {
?>
	<div class="comments" id="comments">
		<?php
		$comments_number = get_comments_number();
		?>
		<div class="comments-header section-inner small max-percentage">
			<h2 class="comment-reply-title">
				<?php
				if (!have_comments()) {
					_e('Leave a comment', 'twentytwenty');
				} elseif ('1' === $comments_number) {
					printf(_x('One reply on &ldquo;%s&rdquo;', 'comments title', 'twentytwenty'), get_the_title());
				} else {
					printf(
						_nx(
							'%1$s reply on &ldquo;%2$s&rdquo;',
							'%1$s replies on &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'twentytwenty'
						),
						number_format_i18n($comments_number),
						get_the_title()
					);
				}
				?>
			</h2>
		</div>

		<div class="comments-inner section-inner thin max-percentage">
			<?php
			wp_list_comments(
				array(
					'walker' => new TwentyTwenty_Walker_Comment(),
					'avatar_size' => 120,
					'style' => 'div',
				)
			);

			$comment_pagination = paginate_comments_links(
				array(
					'echo' => false,
					'end_size' => 0,
					'mid_size' => 0,
					'next_text' => __('Newer Comments', 'twentytwenty') . ' <span aria-hidden="true">&rarr;</span>',
					'prev_text' => '<span aria-hidden="true">&larr;</span> ' . __('Older Comments', 'twentytwenty'),
				)
			);

			if ($comment_pagination) {
				$pagination_classes = '';

				if (false === strpos($comment_pagination, 'prev page-numbers')) {
					$pagination_classes = ' only-next';
				}
			?>
				<nav class="comments-pagination pagination<?php echo esc_attr($pagination_classes); ?>" aria-label="<?php esc_attr_e('Comments', 'twentytwenty'); ?>">
					<?php echo wp_kses_post($comment_pagination); ?>
				</nav>
			<?php
			}
			?>
		</div>
	</div>
<?php
}

if (comments_open() || pings_open()) {
	if ($comments) {
		echo '<hr class="styled-separator is-style-wide" aria-hidden="true" />';
	}
?>

	<!-- Custom Post Form Begins -->
	<section class="card">
		<div class="card-body">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
					<div class="form-group">
						<label class="sr-only" for="comment">Make a Post</label>
						<div class="form-area">
							<?php
							// Custom Comment Form Fields
							comment_form(
								array(
									'title_reply' => '', // Remove title	
									'comment_field' => '<textarea id="comment" name="comment" class="form-control" rows="3" placeholder="What are you thinking..."></textarea>',
									'submit_button' => '<div class="text-right"><button type="submit" class="btn btn-primary">Share</button></div>',
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
	.card {
		margin: 0;
		padding: 0;
		background-color: #F7F7F7;
		border-radius: 5px;
		border: 1px solid #D4D4D4;
	}


	.card-body {
		padding: 20px 0;
	}

	.sr-only {
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


	.form-area {
		border-top: 1px solid #D4D4D4;
		border-bottom: 1px solid #D4D4D4;
		width: 100%;
		background-color: #fff;
		padding: 30px;
	}

	.text-right {
		display: flex;
		justify-content: end;
	}

	.btn {
		margin-top: 20px;
		padding: 1rem 1.5rem;
		border-radius: 0.25rem;
		border: none;
		transition: background-color 0.2s;
		text-transform: lowercase;
		text-decoration: none;

	}

	.btn-primary {
		background-color: #007bff;
		color: white;
	}

	.btn-primary:hover {
		background-color: #0056b3;
		text-decoration: none;
	}
</style>