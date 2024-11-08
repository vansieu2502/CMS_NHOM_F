<footer id="site-footer" class="header-footer-group">

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	
	<!-- Footer -->
<section id="footer">
	<div class="container">
		<div class="row text-center text-xs-center text-sm-left text-md-left">
			<div class="col-xs-12 col-sm-4 col-md-4">
				<h5>Recent Comments</h5>
				<ul class="list-unstyled quick-links">
					<?php
					$recent_comments = get_comments(array(
						'number' => 5, // Number of recent comments to display
						'status' => 'approve' // Only approved comments
					));
					foreach ($recent_comments as $comment) {
						echo '<li><a href="' . get_permalink($comment->comment_post_ID) . '"><i class="fa fa-angle-double-right"></i> ' . get_the_title($comment->comment_post_ID) . '</a></li>';
					}
					?>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4">
				<h5>Categories</h5>
				<ul class="list-unstyled quick-links">
					<?php
					$categories = get_categories();
					foreach ($categories as $category) {
						echo '<li><a href="' . get_category_link($category->term_id) . '"><i class="fa fa-angle-double-right"></i>' . $category->name . '</a></li>';
					}
					?>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4">
				<h5>Latest Posts</h5>
				<ul class="list-unstyled quick-links">
					<?php
					$recent_posts = wp_get_recent_posts(array(
						'numberposts' => 5, // Number of recent posts to display
						'post_status' => 'publish' // Only published posts
					));
					foreach ($recent_posts as $post) {
						echo '<li><a href="' . get_permalink($post["ID"]) . '"><i class="fa fa-angle-double-right"></i> ' . $post["post_title"] . '</a></li>';
					}
					wp_reset_query();
					?>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
				<ul class="list-unstyled list-inline social text-center">
					<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-facebook"></i></a></li>
					<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-twitter"></i></a></li>
					<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-instagram"></i></a></li>
					<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-google-plus"></i></a></li>
					<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i class="fa fa-envelope"></i></a></li>
				</ul>
			</div>
			<hr>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
				<p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
				<p class="h6">© All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p>
			</div>
			<hr>
		</div>
	</div>
</section>
<!-- ./Footer -->
</footer><!-- #site-footer -->

<?php wp_footer(); ?>

</body>
</html>

<style>
	ul.custom-timeline {
    list-style-type: none;
    position: relative;
}
ul.custom-timeline:before {
    content: ' ';
    background: #d4d9df;
    display: inline-block;
    position: absolute;
    left: 29px;
    width: 2px;
    height: 100%;
    z-index: 400;
}
ul.custom-timeline > li {
    margin: 20px 0;
    padding-left: 60px;
}
ul.custom-timeline > li:before {
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
.custom-post-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.custom-post-title {
    display: block;
    max-width: 80%; /* Adjust based on your layout */
    white-space: nowrap; /* Prevent wrapping */
    overflow: hidden; /* Hide overflow */
    text-overflow: ellipsis; /* Add ellipsis */
    width: 70%; /* Set a max width for the title */
}

.custom-post-date {
    font-size: 0.85em;
}
</style>
