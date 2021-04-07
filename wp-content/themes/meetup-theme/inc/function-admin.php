<?php

function meetup_add_admin_page()
{
    add_menu_page('Setup Menu', 'Setup', 'manage_options', 'setup', 'setup_create_page', 'dashicons-admin-generic', 110);
    add_submenu_page('setup', 'Setup Menu', 'General', 'manage_options', 'setup', 'setup_create_page');
    add_submenu_page('setup', 'Home Page', 'Home Page', 'manage_options', 'home_page', 'home_page_create_page');
    add_submenu_page('setup', 'Social Media', 'Social Media', 'manage_options', 'sfsi-options');
    remove_menu_page('sfsi-options');
    add_action('admin_init', 'meetup_custom_settings');
}

add_action('admin_menu', 'meetup_add_admin_page');

function meetup_custom_settings()
{
    register_setting('meetup-setup-groups', 'hero_header');
    register_setting('meetup-setup-groups', 'hero_subtitle_1');
    register_setting('meetup-setup-groups', 'hero_subtitle_2');
    register_setting('meetup-setup-groups', 'hero_button');
    register_setting('meetup-setup-groups', 'hero_button_link');
    register_setting('meetup-setup-groups', 'hero_image');
    register_setting('meetup-setup-groups', 'slider_header_1');
    register_setting('meetup-setup-groups', 'slider_header_2');
    register_setting('meetup-setup-groups', 'slider_header_3');
    register_setting('meetup-setup-groups', 'slider_subtitle_1');
    register_setting('meetup-setup-groups', 'slider_subtitle_2');
    register_setting('meetup-setup-groups', 'slider_subtitle_3');
    register_setting('meetup-setup-groups', 'slider_button_text_1');
    register_setting('meetup-setup-groups', 'slider_button_text_2');
    register_setting('meetup-setup-groups', 'slider_button_text_3');
    register_setting('meetup-setup-groups', 'slider_button_link_1');
    register_setting('meetup-setup-groups', 'slider_button_link_2');
    register_setting('meetup-setup-groups', 'slider_button_link_3');
    register_setting('meetup-setup-groups', 'slider_image_1');
    register_setting('meetup-setup-groups', 'slider_image_2');
    register_setting('meetup-setup-groups', 'slider_image_3');
    register_setting('meetup-setup-general', 'contact_email');
    register_setting('meetup-setup-general', 'contact_phone');
    register_setting('meetup-setup-general', 'site_logo');
    register_setting('meetup-setup-general', 'default_banner');
    register_setting('meetup-setup-general', 'google_api_key');

    add_settings_section('home_page-hero', 'Hero Section', 'hero_section_function', 'home_page');
    add_settings_section('home_page-slider_1', 'Image Slide 1', 'slider_section_function_1', 'home_page');
    add_settings_section('home_page-slider_2', 'Image Slide 2', 'slider_section_function_2', 'home_page');
    add_settings_section('home_page-slider_3', 'Image Slide 3', 'slider_section_function_3', 'home_page');
    add_settings_section('setup-contact', 'Contact Info', 'contact_function', 'setup');
    add_settings_section('setup-site_logo', 'Upload Logo', 'site_logo_section_function', 'setup');
    add_settings_section('setup-default_banner', 'Default Banner', 'default_banner_section_function', 'setup');
    add_settings_section('setup-google_api', 'Google API', 'google_api_section_function', 'setup');

    add_settings_field('hero-header', 'Header', 'hero_header_function', 'home_page', 'home_page-hero');
    add_settings_field('hero-subtitle', 'Subtitle 1', 'hero_subtitle_function', 'home_page', 'home_page-hero');
    add_settings_field('hero-subtitle-2', 'Subtitle 2', 'hero_subtitle_function_2', 'home_page', 'home_page-hero');
    add_settings_field('hero-button', 'Button Text', 'hero_button_function', 'home_page', 'home_page-hero');
    add_settings_field('hero-button-link', 'Button Link', 'hero_button_link_function', 'home_page', 'home_page-hero');
    add_settings_field('hero-image', 'Banner Image <p class="image_recommend_text">Recommended Image Size: 1920x520</p>', 'hero_image_function', 'home_page', 'home_page-hero');
    add_settings_field('slider_header_1', 'Header', 'slider_header_function_1', 'home_page', 'home_page-slider_1');
    add_settings_field('slider_header_2', 'Header', 'slider_header_function_2', 'home_page', 'home_page-slider_2');
    add_settings_field('slider_header_3', 'Header', 'slider_header_function_3', 'home_page', 'home_page-slider_3');
    add_settings_field('slider_subtitle_1', 'Subtitle', 'slider_subtitle_function_1', 'home_page', 'home_page-slider_1');
    add_settings_field('slider_subtitle_2', 'Subtitle', 'slider_subtitle_function_2', 'home_page', 'home_page-slider_2');
    add_settings_field('slider_subtitle_3', 'Subtitle', 'slider_subtitle_function_3', 'home_page', 'home_page-slider_3');
    add_settings_field('slider_button_text_1', 'Button Text', 'slider_button_text_function_1', 'home_page', 'home_page-slider_1');
    add_settings_field('slider_button_text_2', 'Button Text', 'slider_button_text_function_2', 'home_page', 'home_page-slider_2');
    add_settings_field('slider_button_text_3', 'Button Text', 'slider_button_text_function_3', 'home_page', 'home_page-slider_3');
    add_settings_field('slider_button_link_1', 'Button Link', 'slider_button_link_function_1', 'home_page', 'home_page-slider_1');
    add_settings_field('slider_button_link_2', 'Button Link', 'slider_button_link_function_2', 'home_page', 'home_page-slider_2');
    add_settings_field('slider_button_link_3', 'Button Link', 'slider_button_link_function_3', 'home_page', 'home_page-slider_3');
    add_settings_field('slider_image_1', 'Image <p class="image_recommend_text">Recommended Image Size: 1920x520</p>', 'slider_image_function_1', 'home_page', 'home_page-slider_1');
    add_settings_field('slider_image_2', 'Image <p class="image_recommend_text">Recommended Image Size: 1920x520</p>', 'slider_image_function_2', 'home_page', 'home_page-slider_2');
    add_settings_field('slider_image_3', 'Image <p class="image_recommend_text">Recommended Image Size: 1920x520</p>', 'slider_image_function_3', 'home_page', 'home_page-slider_3');
    add_settings_field('contact_email', 'Email', 'contact_email_function', 'setup', 'setup-contact');
    add_settings_field('contact_phone', 'Phone', 'contact_phone_function', 'setup', 'setup-contact');
    add_settings_field('site_logo', 'Image <p class="image_recommend_text">Recommended Image Size: 192x48</p>', 'site_logo_field_function', 'setup', 'setup-site_logo');
    add_settings_field('default_banner', 'Image <p class="image_recommend_text">Recommended Image Size: 1920x300</p>', 'default_banner_field_function', 'setup', 'setup-default_banner');
    add_settings_field('google_api_key', 'API Key', 'google_api_field_function', 'setup', 'setup-google_api');
}

function hero_section_function() { 
    echo '<a href="' . home_url() . '" target="_blank">Click here to preview.</a>';
}

function slider_section_function_1() {
    echo '<a href="' . home_url() . '#hero-slider" target="_blank">Click here to preview.</a>';
}
function slider_section_function_2()
{
    echo '<a href="' . home_url() . '#hero-slider" target="_blank">Click here to preview.</a>';
}
function slider_section_function_3()
{
    echo '<a href="' . home_url() . '#hero-slider" target="_blank">Click here to preview.</a>';
}

function contact_function()
{
    echo 'Enter contact info to be displayed in website footer.';
}

function site_logo_section_function()
{
    echo 'Upload an image of your logo to be displayed in the header and footer.';
}

function default_banner_section_function()
{
    echo 'Upload an image to be used as a default header banner for all pages. You can edit individual page banners by editing their page and going to the "Banner Image" section.';
}

function google_api_section_function() 
{
    echo '<p>If you have a Google Cloud Platform account, enter your API key here to enable Google Maps picker. <strong>Be sure to enable "Maps Javascript" and "Places" API.</strong></p>';
    echo '<a href="https://developers.google.com/maps/gmp-get-started" target="_blank">Click here to learn more about Google Cloud Platform.</a>';
}

function hero_header_function()
{
    $heroHeader = esc_attr(get_option('hero_header'));
    echo '<input type="text" name="hero_header" value="' . $heroHeader . '" placeholder="Welcome to our Site!"/>';
}

function hero_subtitle_function()
{
    $heroSubtitle1 = esc_attr(get_option('hero_subtitle_1'));
    echo '<input type="text" name="hero_subtitle_1" value="' . $heroSubtitle1 . '"/>';
}

function hero_subtitle_function_2()
{
    $heroSubtitle2 = esc_attr(get_option('hero_subtitle_2'));
    echo '<input type="text" name="hero_subtitle_2" value="' . $heroSubtitle2 . '"/>';
}

function hero_button_function()
{
    $heroButton = esc_attr(get_option('hero_button'));
    echo '<input type="text" name="hero_button" value="' . $heroButton . '"/>';
}

function hero_button_link_function()
{
    $heroButtonLink = esc_attr(get_option('hero_button_link'));
    echo '<input type="text" name="hero_button_link" value="' . $heroButtonLink . '"/>';
}

function hero_image_function()
{
    $heroImage = esc_attr(get_option('hero_image'));
    echo '<input type="hidden" id="hero-image" name="hero_image" value="' . $heroImage . '"/>';
    echo '<input type="button" class="button button-secondary image-upload-btn" value="Upload Image">';
    echo '<p class="description">' . basename($heroImage) . '</p>';
}

function slider_header_function_1()
{
    $sliderHeader1 = esc_attr(get_option('slider_header_1'));
    echo '<input type="text" name="slider_header_1" value="' . $sliderHeader1 . '"/>';
}
function slider_header_function_2()
{
    $sliderHeader2 = esc_attr(get_option('slider_header_2'));
    echo '<input type="text" name="slider_header_2" value="' . $sliderHeader2 . '"/>';
}
function slider_header_function_3()
{
    $sliderHeader3 = esc_attr(get_option('slider_header_3'));
    echo '<input type="text" name="slider_header_3" value="' . $sliderHeader3 . '"/>';
}


function slider_subtitle_function_1()
{
    $sliderSubtitle1 = esc_attr(get_option('slider_subtitle_1'));
    echo '<input type="text" name="slider_subtitle_1" value="' . $sliderSubtitle1 . '"/>';
}
function slider_subtitle_function_2()
{
    $sliderSubtitle2 = esc_attr(get_option('slider_subtitle_2'));
    echo '<input type="text" name="slider_subtitle_2" value="' . $sliderSubtitle2 . '"/>';
}
function slider_subtitle_function_3()
{
    $sliderSubtitle3 = esc_attr(get_option('slider_subtitle_3'));
    echo '<input type="text" name="slider_subtitle_3" value="' . $sliderSubtitle3 . '"/>';
}

function slider_button_text_function_1()
{
    $sliderButtonText1 = esc_attr(get_option('slider_button_text_1'));
    echo '<input type="text" name="slider_button_text_1" value="' . $sliderButtonText1 . '"/>';
}
function slider_button_text_function_2()
{
    $sliderButtonText2 = esc_attr(get_option('slider_button_text_2'));
    echo '<input type="text" name="slider_button_text_2" value="' . $sliderButtonText2 . '"/>';
}
function slider_button_text_function_3()
{
    $sliderButtonText3 = esc_attr(get_option('slider_button_text_3'));
    echo '<input type="text" name="slider_button_text_3" value="' . $sliderButtonText3 . '"/>';
}

function slider_button_link_function_1()
{
    $sliderButtonLink1 = esc_attr(get_option('slider_button_link_1'));
    echo '<input type="link" name="slider_button_link_1" value="' . $sliderButtonLink1 . '"/>';
}
function slider_button_link_function_2()
{
    $sliderButtonLink2 = esc_attr(get_option('slider_button_link_2'));
    echo '<input type="link" name="slider_button_link_2" value="' . $sliderButtonLink2 . '"/>';
}
function slider_button_link_function_3()
{
    $sliderButtonLink3 = esc_attr(get_option('slider_button_link_3'));
    echo '<input type="link" name="slider_button_link_3" value="' . $sliderButtonLink3 . '"/>';
}

function slider_image_function_1()
{
    $sliderImage1 = esc_attr(get_option('slider_image_1'));
    echo '<input type="hidden" id="slider-image_1" name="slider_image_1" value="' . $sliderImage1 . '"/>';
    echo '<input type="button" class="button button-secondary image-upload-btn" value="Upload Image">';
    echo '<p class="description">' . basename($sliderImage1) . '</p>';
}
function slider_image_function_2()
{
    $sliderImage2 = esc_attr(get_option('slider_image_2'));
    echo '<input type="hidden" id="slider-image_2" name="slider_image_2" value="' . $sliderImage2 . '"/>';
    echo '<input type="button" class="button button-secondary image-upload-btn" value="Upload Image">';
    echo '<p class="description">' . basename($sliderImage2) . '</p>';
}
function slider_image_function_3()
{
    $sliderImage3 = esc_attr(get_option('slider_image_3'));
    echo '<input type="hidden" id="slider-image_3" name="slider_image_3" value="' . $sliderImage3 . '"/>';
    echo '<input type="button" class="button button-secondary image-upload-btn" value="Upload Image">';
    echo '<p class="description">' . basename($sliderImage3) . '</p>';
}

function contact_phone_function()
{
    $contactPhone = esc_attr(get_option('contact_phone'));
    echo '<input type="text" name="contact_phone" value="' . $contactPhone . '"/>';
}

function contact_email_function()
{
    $contactEmail = esc_attr(get_option('contact_email'));
    echo '<input type="text" name="contact_email" value="' . $contactEmail . '"/>';
}

function site_logo_field_function()
{
    $siteLogo = esc_attr(get_option('site_logo'));
    echo '<input type="hidden" id="site-logo" name="site_logo" value="' . $siteLogo . '"/>';
    echo '<input type="button" class="button button-secondary image-upload-btn" value="Upload Image">';
    echo '<p class="description">' . basename($siteLogo) . '</p>';
}

function default_banner_field_function()
{
    $defaultBanner = esc_attr(get_option('default_banner'));
    echo '<input type="hidden" id="default-banner" name="default_banner" value="' . $defaultBanner . '"/>';
    echo '<input type="button" class="button button-secondary image-upload-btn" value="Upload Image">';
    echo '<p class="description">' . basename($defaultBanner) . '</p>';
}

function google_api_field_function() 
{
    $googleAPIKey = esc_attr(get_option('google_api_key'));
    echo '<input type="text" name="google_api_key" value="' . $googleAPIKey . '"/>';
}



function setup_create_page()
{
    ?>
        <h1>General Setup</h1>
        <div>
            <h3>Title, Address, and Time Format</h3>
            <p>Update the website's title, website adress URL, and format of how you want the date and time displayed.</p>
            <p><a href="<?php echo admin_url('options-general.php') ?>" target="_blank">Click here to update these in the settings page.</a></p>
            <br>
        </div>
        <div>
            <h3>About Page</h3>
            <p>Update the about page. You can also add, edit, or delete children pages of the About page (e.g. Our Mission and Our History pages).</p>
            <p><a href="<?php echo admin_url('edit.php?post_type=page') ?>" target="_blank">Click here to edit About pages.</a></p>
            <br>
        </div>
        <div>
            <h3>Private Policy and Legal Pages</h3>
            <p>This theme provides a generic private policy and legal page template, simply replace the filler lines with your website information.</p>
            <p><a href="<?php echo admin_url('post.php?post=3&action=edit') ?>" target="_blank">Click here to edit Private Policy page</a></p>
            <p><a href="<?php echo admin_url('post.php?post=138&action=edit') ?>" target="_blank">Click here to edit Legal page</a></p>
            <br>
        </div>

        <?php settings_errors(); ?>
        <form method="post" action="options.php">
            <?php
                settings_fields('meetup-setup-general');
                do_settings_sections('setup');
                submit_button();
            ?>
        </form>
    <?php
}

function home_page_create_page()
{
    ?>
    <h1>Customize Home Page</h1>
    <?php settings_errors(); ?>
    <form method="post" action="options.php">
        <?php
            settings_fields('meetup-setup-groups');
            do_settings_sections('home_page');
            submit_button();
        ?>
    </form>
<?php
}
