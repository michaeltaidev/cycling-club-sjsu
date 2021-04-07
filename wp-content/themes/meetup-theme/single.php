<?php

get_header();

while (have_posts()) {
	the_post();
	pageBanner();

	?>
	<div class="container container--narrow page-section">
		<div class="metabox metabox--position-up metabox--with-home-link">
			<p>
				<a class="metabox__blog-home-link" href="<?php echo site_url('/blog'); ?>">
					<i class="fa fa-home" aria-hidden="true"></i>
					Back to <?php echo get_the_title(get_option('page_for_posts')); ?>
				</a>
				<span class="metabox__main">Posted on <?php the_date(); ?></span>
			</p>
		</div>

		<div class="generic-content"><?php the_content(); ?></div>
	</div>
<?php }

get_footer();

?>