<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header class="site-header">
		<div class="container">
			<h1 class="school-logo-text float-left">
				<a href="<?php echo home_url(); ?>">
					<?php $siteLogo = esc_attr(get_option('site_logo')); ?>
					<img src="<?php echo $siteLogo ?>" class="header-logo">
				</a>
			</h1>
			<span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
			<i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
			<div class="site-header__menu group">
				<nav class="main-navigation">
					<ul>
						<li <?php if (is_front_page()) echo 'class="current-menu-item"' ?>>
							<a href="<?php echo get_home_url() ?>"><?php echo get_the_title(get_option('page_on_front')); ?></a>
						</li>
						<li <?php if (is_page('about-us') or wp_get_post_parent_id(0) == 11) echo 'class="current-menu-item"' ?>>
							<a href="<?php echo site_url('/about-us') ?>"><?php echo get_the_title(11); ?></a>
						</li>
						<li <?php if (get_post_type() == 'event' or is_page('past-events')) echo 'class="current-menu-item"' ?>>
							<a href="<?php echo get_post_type_archive_link('event'); ?>">Events</a>
						</li>
						<li <?php if (get_post_type() == 'post') echo 'class="current-menu-item"' ?>>
							<a href="<?php echo site_url('/news'); ?>"><?php echo get_the_title(get_option('page_for_posts')); ?></a>
						</li>
					</ul>
				</nav>
				<div class="site-header__util">
					<span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
				</div>
			</div>
		</div>
	</header>