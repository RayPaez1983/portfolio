<?php
/*
Plugin Name: Ninja Forms - File Uploads
Plugin URI: http://ninjaforms.com
Description: File Uploads add-on for Ninja Forms.
Version: 1.2.1
Author: The WP Ninjas
Author URI: http://ninjaforms.com
*/
global $wpdb;

define("NINJA_FORMS_UPLOADS_DIR", WP_PLUGIN_DIR."/".basename( dirname( __FILE__ ) ) );
define("NINJA_FORMS_UPLOADS_URL", plugins_url()."/".basename( dirname( __FILE__ ) ) );
define("NINJA_FORMS_UPLOADS_TABLE_NAME", $wpdb->prefix . "ninja_forms_uploads");
define("NINJA_FORMS_UPLOADS_VERSION", "1.2.1");

function ninja_forms_uploads_setup_license() {
	if ( class_exists( 'NF_Extension_Updater' ) ) {
		$NF_Extension_Updater = new NF_Extension_Updater( 'File Uploads', NINJA_FORMS_UPLOADS_VERSION, 'WP Ninjas', __FILE__, 'uploads' );
	}
}

add_action( 'admin_init', 'ninja_forms_uploads_setup_license' );

require_once(NINJA_FORMS_UPLOADS_DIR."/includes/admin/pages/ninja-forms-uploads/tabs/browse-uploads/browse-uploads.php");
require_once(NINJA_FORMS_UPLOADS_DIR."/includes/admin/pages/ninja-forms-uploads/tabs/browse-uploads/sidebars/select-uploads.php");
require_once(NINJA_FORMS_UPLOADS_DIR."/includes/admin/pages/ninja-forms-uploads/tabs/upload-settings/upload-settings.php");
require_once(NINJA_FORMS_UPLOADS_DIR."/includes/admin/scripts.php");
require_once(NINJA_FORMS_UPLOADS_DIR."/includes/admin/help.php");

require_once(NINJA_FORMS_UPLOADS_DIR."/includes/display/processing/pre-process.php");
require_once(NINJA_FORMS_UPLOADS_DIR."/includes/display/processing/process.php");
require_once(NINJA_FORMS_UPLOADS_DIR."/includes/display/processing/attach-image.php");
require_once(NINJA_FORMS_UPLOADS_DIR."/includes/display/processing/shortcode-filter.php");
require_once(NINJA_FORMS_UPLOADS_DIR."/includes/display/processing/post-meta-filter.php");
require_once(NINJA_FORMS_UPLOADS_DIR."/includes/display/processing/email-value-filter.php");

require_once(NINJA_FORMS_UPLOADS_DIR."/includes/display/scripts.php");
require_once(NINJA_FORMS_UPLOADS_DIR."/includes/display/mp-confirm-filter.php");

require_once(NINJA_FORMS_UPLOADS_DIR."/includes/fields/file-uploads.php");

require_once(NINJA_FORMS_UPLOADS_DIR."/includes/activation.php");
require_once(NINJA_FORMS_UPLOADS_DIR."/includes/ajax.php");
require_once(NINJA_FORMS_UPLOADS_DIR."/includes/functions.php");


//Add File Uploads to the admin menu
add_action('admin_menu', 'ninja_forms_add_upload_menu', 99);
function ninja_forms_add_upload_menu(){
	$capabilities = 'administrator';
	$capabilities = apply_filters( 'ninja_forms_admin_menu_capabilities', $capabilities );

	$uploads = add_submenu_page("ninja-forms", "File Uploads", "File Uploads", $capabilities, "ninja-forms-uploads", "ninja_forms_admin");
	add_action('admin_print_styles-' . $uploads, 'ninja_forms_admin_js');
	add_action('admin_print_styles-' . $uploads, 'ninja_forms_uploads_admin_js');
	add_action('admin_print_styles-' . $uploads, 'ninja_forms_admin_css');
}

register_activation_hook( __FILE__, 'ninja_forms_uploads_activation' );

$plugin_settings = get_option( 'ninja_forms_settings' );

if( isset( $plugin_settings['uploads_version'] ) ){
	$current_version = $plugin_settings['uploads_version'];
}else{
	$current_version = 0.4;
}

if( version_compare( $current_version, '0.5', '<' ) ){
	ninja_forms_uploads_activation();
}