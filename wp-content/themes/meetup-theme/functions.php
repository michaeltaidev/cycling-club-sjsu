<?php 

require get_theme_file_path('/inc/function-search.php');
require get_theme_file_path('/inc/function-admin.php');

function pageBanner($args = NULL) {
	if (!$args['title']) {
		$args['title'] = get_the_title();
	}

	if (!$args['subtitle']) {
		$args['subtitle'] = get_field('banner_subtitle');
	}

	if (!$args['photo']) {
		if (get_field('banner_image')) {
			$args['photo'] = get_field('banner_image')['sizes']['pageBanner'];
		} else {
			$defaultBanner = esc_attr(get_option('default_banner'));
			$args['photo'] = $defaultBanner;
		}
	}

	?>
		<div class="page-banner">
			<div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>);"></div>
			<div class="page-banner__content container container--narrow">
				<h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
				<div class="page-banner__intro">
					<p><?php echo $args['subtitle']; ?></p>
				</div>
			</div>
		</div>
	<?php
}

function meetup_files() {
	// *Be sure to load googleMap script first*
	$googleAPIKey = esc_attr(get_option('google_api_key'));
	wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=' . $googleAPIKey, NULL, '1.0', true);
	wp_enqueue_script('meetup-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(), true);
	wp_enqueue_style('font-roboto', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('meetup_main_styles', get_stylesheet_uri());
	wp_localize_script('meetup-js', 'meetupData', array(
		'root_url' => get_site_url(), 
		'news_name' => get_the_title(get_option('page_for_posts'))
	));
}

add_action('wp_enqueue_scripts', 'meetup_files');

function meetup_features() {
	register_nav_menu('headerMenuLocation', 'Header Menu Location');
	register_nav_menu('footerLocation1', 'Footer Location 1');
	register_nav_menu('footerLocation2', 'Footer Location 2');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_image_size('profProfileLandscape', 400, 260, true);
	add_image_size('profProfileSquare', 400, 400, true);
	add_image_size('pageBanner', 1500, 350, true);
}

add_action('after_setup_theme', 'meetup_features');

function meetup_adjust_queries($query) {
	if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
		$today = date('Y-m-d H:i:s');
		$query->set('meta_key', 'event_date');
		$query->set('orderby', 'meta_value');
		$query->set('order', 'ASC');
		$query->set('posts_per_page', '10');
		$query->set('meta_query', array(
		array(
			'key' => 'event_date',
			'compare' => '>=',
			'value' => $today,
			'type' => 'DATETIME'
		)
	));
	}
}

add_action('pre_get_posts', 'meetup_adjust_queries');

// Change default post type
function revcon_change_post_label()
{
	global $menu;
	global $submenu;
	$menu[5][0] = 'News';
	$submenu['edit.php'][5][0] = 'News';
	$submenu['edit.php'][10][0] = 'Add News';
	$submenu['edit.php'][16][0] = 'News Tags';
}
function revcon_change_post_object()
{
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'News';
	$labels->singular_name = 'News';
	$labels->add_new = 'Add News';
	$labels->add_new_item = 'Add News';
	$labels->edit_item = 'Edit News';
	$labels->new_item = 'News';
	$labels->view_item = 'View News';
	$labels->search_items = 'Search News';
	$labels->not_found = 'No News found';
	$labels->not_found_in_trash = 'No News found in Trash';
	$labels->all_items = 'All News';
	$labels->menu_name = 'News';
	$labels->name_admin_bar = 'News';
}

add_action('admin_menu', 'revcon_change_post_label');
add_action('init', 'revcon_change_post_object');

// Admin CSS and JS files
function meetup_load_admin_scripts($hook) {
	if ($hook != 'toplevel_page_setup' or 'setup_page_home_page') {
		wp_register_style('meetup_admin', get_template_directory_uri() . '/css/meetup.admin.css', array(), '1.0', 'all');
		wp_enqueue_style('meetup_admin');
		wp_enqueue_media();
		wp_register_script('meetup-admin-script', get_template_directory_uri() . '/js/meetup.admin.js', array('jquery'), '1.0', true);
		wp_enqueue_script('meetup-admin-script');
	}
}

add_action('admin_enqueue_scripts', 'meetup_load_admin_scripts');

// Google API
function meetupMapKey($api) {
	$googleAPIKey = esc_attr(get_option('google_api_key'));
	$api['key'] = $googleAPIKey;
	return $api;
}

add_filter('acf/fields/google_map/api', 'meetupMapKey');

// Redirect users to homepage when logging in
add_action('admin_init', 'redirectLogin');

function redirectLogin() {
	$ourCurrentUser = wp_get_current_user();
	if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
		wp_redirect(site_url('/'));
		exit;
	}
}

// Hide admin bar from users
add_action('wp_loaded', 'hideAdminBar');

function hideAdminBar()
{
	$ourCurrentUser = wp_get_current_user();
	if (count($ourCurrentUser->roles) == 1 and $ourCurrentUser->roles[0] == 'subscriber') {
		show_admin_bar(false);
	}
}

// Customize login screen
add_filter('login_headerurl', 'ourHeaderUrl');

function ourHeaderUrl() {
	return esc_url(site_url('/'));
}

add_action('login_enqueue_scripts', 'ourLoginCSS');

function ourLoginCSS() {
	wp_enqueue_style('meetup_main_styles', get_stylesheet_uri());
	wp_enqueue_style('font-roboto', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
}

add_filter('login_headertitle', 'ourLoginTitle');

function ourLoginTitle() {
	return get_bloginfo('name');
}

// Default header banner and logo

add_action('admin_menu', 'add_global_custom_options');

function add_global_custom_options()  
{  
	add_options_page('Global Custom Options', 'Global Custom Options', 'manage_options', 'functions','global_custom_options', 1);  
}

function global_custom_options() {
?>
	<div class="wrap">
		<h2>Global Custom Options</h2>
		<form method="post" action="options.php">
			<?php wp_nonce_field('update-options') ?>
			<p><strong>Default Banner:</strong><br />
				<input type="file" name="twitterid" size="45" value="<?php echo get_option('twitterid'); ?>" />
			</p>
			<p><input type="submit" name="Submit" value="Apply" /></p>
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="page_options" value="twitterid" />
		</form>
	</div>
<?php
}