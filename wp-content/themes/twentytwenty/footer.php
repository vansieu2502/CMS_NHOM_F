<footer id="site-footer" class="header-footer-group">

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<div class="container mt-5 mb-5">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<h4>Latest News</h4>
				<ul class="timeline">

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
								<div class="post-info">
									<a href="<?php the_permalink(); ?>" target="_blank" class="post-title"><?php the_title(); ?></a>
									<a href="#" class="post-date float-right"><?php echo get_the_date(); ?></a>
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
</footer><!-- #site-footer -->

<?php wp_footer(); ?>

</body>

</html>

<style>
	ul.timeline {
		list-style-type: none;
		position: relative;
	}

	ul.timeline:before {
		content: ' ';
		background: #d4d9df;
		display: inline-block;
		position: absolute;
		left: 29px;
		width: 2px;
		height: 100%;
		z-index: 400;
	}

	ul.timeline>li {
		margin: 20px 0;
		padding-left: 60px;
	}

	ul.timeline>li:before {
		content: ' ';
		background: white;
		display: inline-block;
		position: absolute;
		border-radius: 50%;
		border: 3px solid #22c0e8;
		left: 20px;
		width: 20px;
		height: 20px;
		z-index: 400;
	}

	/* Flex container to align title and date in the same row */
	.post-info {
		display: flex;
		justify-content: space-between;
		align-items: center;
	}

	.post-title {
		display: block;
		max-width: 80%;
		/* Adjust based on your layout */
		white-space: nowrap;
		/* Prevent wrapping */
		overflow: hidden;
		/* Hide overflow */
		text-overflow: ellipsis;
		/* Add ellipsis */
		width: 70%;
		/* Set a max width for the title */
	}

	.post-date {
		font-size: 0.85em;
	}
</style>