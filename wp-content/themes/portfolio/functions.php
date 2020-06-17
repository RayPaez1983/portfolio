<?php
/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/includes/functions/setup.php';

/*add_filter( 'pw-google-maps-api-key', function() {
    return 'AIzaSyC07pWHlL86B89008dX8dJQ0Vc1XqbpQvI';
});*/

add_filter( 'cmb2_render_pw_map', function() {
	wp_deregister_script( 'pw-google-maps-api' );
	wp_register_script( 'pw-google-maps-api', '//maps.googleapis.com/maps/api/js?libraries=places&key=XXXXXXXXXXXXXXXXXXXXXXXXXXX', null, null );
}, 12 );

//Redux::init( 'project_options' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
require get_template_directory() . '/includes/functions/widgets.php';

/**
* Load functions to secure your WP install.
*/
require get_template_directory() . '/includes/functions/security.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/includes/functions/loads.php';

/**
 * Custom options theme
 */
require get_template_directory() . '/includes/functions/options_config.php';

/**
 * All Ajax .
 */
// require get_template_directory() . '/includes/functions/ajax/ajax-example.php';

/**
 *  Generate variables JS globals
 */
require get_template_directory() . '/includes/functions/generate_variables_js.php';

/**
 *  Add category and post tag to pages
 */
require get_template_directory() . '/includes/functions/category_page.php';

// DEV
show_admin_bar( false );

function cc_mime_types($mimes) {
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

