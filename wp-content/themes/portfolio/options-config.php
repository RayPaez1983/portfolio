<?php
if ( ! class_exists( 'Redux' ) ) {
    return;
}

$opt_name = "project_options";

$sampleHTML = '';

if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
    Redux_Functions::initWpFilesystem();

    global $wp_filesystem;

    $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
}

$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
$sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
$sample_patterns      = array();

if ( is_dir( $sample_patterns_path ) ) {

    if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
        $sample_patterns = array();

        while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

            if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                $name              = explode( '.', $sample_patterns_file );
                $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                $sample_patterns[] = array(
                    'alt' => $name,
                    'img' => $sample_patterns_url . $sample_patterns_file
                );
            }
        }
    }
}

$theme = wp_get_theme();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get( 'Name' ),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => __( 'Configuraciones del Tema', 'agathostechnology' ),
    'page_title'           => __( 'Configuraciones del Tema', 'agathostechnology' ),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    )
);

$args['admin_bar_links'][] = array(
    'id'    => 'redux-docs',
    'href'  => 'http://docs.reduxframework.com/',
    'title' => __( 'Documentación', 'agathostechnology' ),
);

$args['admin_bar_links'][] = array(
    //'id'    => 'redux-support',
    'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
    'title' => __( 'Soporte', 'agathostechnology' ),
);

$args['admin_bar_links'][] = array(
    'id'    => 'redux-extensions',
    'href'  => 'reduxframework.com/extensions',
    'title' => __( 'Extensiones', 'agathostechnology' ),
);

// Panel Intro text -> before the form
if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
    if ( ! empty( $args['global_variable'] ) ) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace( '-', '_', $args['opt_name'] );
    }
    //$args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'agathostechnology' ), $v );
} else {
    //$args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'agathostechnology' );
}

Redux::setArgs( $opt_name, $args );

$tabs = array(
    array(
        'id'      => 'redux-help-tab-1',
        'title'   => __( 'Theme Information 1', 'agathostechnology' ),
        'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'agathostechnology' )
    ),
    array(
        'id'      => 'redux-help-tab-2',
        'title'   => __( 'Theme Information 2', 'agathostechnology' ),
        'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'agathostechnology' )
    )
);
Redux::setHelpTab( $opt_name, $tabs );

// Set the help sidebar
$content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'agathostechnology' );
Redux::setHelpSidebar( $opt_name, $content );

// -> Example: Section creation
Redux::setSection( $opt_name, array(
    'title'            => __( 'Site', 'agathostechnology' ),
    'id'               => 'basic',
    'desc'             => __( 'Settings of site.', 'agathostechnology' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-home'
));

Redux::setSection( $opt_name, array(
    'title'                 => __('General','agathostechnology'),
    'id'                    => 'general_settings',
    'subsection'            => true,
    'customizer_width'      => '400px',
    'desc'                  => __('General Settings', 'agathostechnology'),
    'fields'                => array(
        array(
            'id'       => 'general_settings_logo',
            'type'     => 'media',
            'title'    => __( 'Logo', 'agathostechnology' ),
            'subtitle' => __( 'Upload a svg file', 'agathostechnology' ),
        ),
        array(
            'id'       => 'general_settings_logo_symbol',
            'type'     => 'media',
            'title'    => __( 'Logo Symbol', 'agathostechnology' ),
        ),
        array(
            'id'       => 'general_settings_phone',
            'type'     => 'text',
            'title'    => __( 'Phone', 'agathostechnology' ),
            'subtitle' => __( 'Type your phone contact', 'agathostechnology' ),
        ),
        array(
            'id'       => 'general_settings_email',
            'type'     => 'text',
            'title'    => __( 'Email', 'agathostechnology' ),
            'subtitle' => __( 'Type your email contact', 'agathostechnology' ),
        ),
        array(
            'id'       => 'general_settings_social_linkedin',
            'type'     => 'text',
            'title'    => __( 'Linkedin', 'agathostechnology' ),
            'subtitle' => __( 'Type your Linkedin account', 'agathostechnology' ),
        ),
        array(
            'id'       => 'general_settings_social_facebook',
            'type'     => 'text',
            'title'    => __( 'Facebook', 'agathostechnology' ),
            'subtitle' => __( 'Type your Facebook account', 'agathostechnology' ),
        ),
        array(
            'id'       => 'general_settings_social_twitter',
            'type'     => 'text',
            'title'    => __( 'Twitter', 'agathostechnology' ),
            'subtitle' => __( 'Type your Twitter account', 'agathostechnology' ),
        ),
        array(
            'id'       => 'general_settings_homepage',
            'type'     => 'select',
            'multi'    => false,
            'data'     => 'page',
            'title'    => __( 'Homepage', 'agathostechnology' ),
            'subtitle' => __( 'Choose your home', 'agathostechnology' ),
        ),
    )
));

if ( ! function_exists( 'compiler_action' ) ) {
    function compiler_action( $options, $css, $changed_values ) {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r( $changed_values );
        echo "</pre>";
    }
}

if ( ! function_exists( 'redux_validate_callback_function' ) ) {
    function redux_validate_callback_function( $field, $value, $existing_value ) {
        $error   = false;
        $warning = false;

        //do your validation
        if ( $value == 1 ) {
            $error = true;
            $value = $existing_value;
        } elseif ( $value == 2 ) {
            $warning = true;
            $value   = $existing_value;
        }

        $return['value'] = $value;

        if ( $error == true ) {
            $return['error'] = $field;
            $field['msg']    = 'your custom error message';
        }

        if ( $warning == true ) {
            $return['warning'] = $field;
            $field['msg']      = 'your custom warning message';
        }

        return $return;
    }
}

if ( ! function_exists( 'redux_my_custom_field' ) ) {
    function redux_my_custom_field( $field, $value ) {
        print_r( $field );
        echo '<br/>';
        print_r( $value );
    }
}

if ( ! function_exists( 'dynamic_section' ) ) {
    function dynamic_section( $sections ) {
        //$sections = array();
        $sections[] = array(
            'title'  => __( 'Section via hook', 'agathostechnology' ),
            'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'agathostechnology' ),
            'icon'   => 'el el-paper-clip',
            // Leave this as a blank section, no options just some intro text set above.
            'fields' => array()
        );

        return $sections;
    }
}

if ( ! function_exists( 'change_arguments' ) ) {
    function change_arguments( $args ) {
        //$args['dev_mode'] = true;

        return $args;
    }
}

if ( ! function_exists( 'change_defaults' ) ) {
    function change_defaults( $defaults ) {
        $defaults['str_replace'] = 'Testing filter hook!';

        return $defaults;
    }
}

if ( ! function_exists( 'remove_demo' ) ) {
    function remove_demo() {
        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
            ), null, 2 );

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
        }
    }
}
