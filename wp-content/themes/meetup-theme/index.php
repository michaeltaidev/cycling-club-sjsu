<?php
	get_header();
	pageBanner(array(
		'title' => get_the_title(get_option('page_for_posts', true)),
	));
?>

<div class="container container--narrow page-section">
	<?php
		while (have_posts()) {
			the_post();
			?>
				<div class="post-item">
					<h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<div class="metabox">
						<p>Posted on <?php the_date(); ?></p>
					</div>

					<div class="generic-content">
						<p><?php echo wp_trim_words(get_the_content(), 40) ?></p>
						<p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Continue reading &raquo</a></p>
					</div>
				</div>
			<?php
		}
		echo paginate_links();
	?>
</div>

<?php get_footer(); ?>