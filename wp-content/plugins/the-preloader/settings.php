<?php

    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

    function WPTime_preloader_settings() {
        add_plugins_page( 'Preloader Settings', 'Preloader', 'manage_options', 'WPTime_preloader_settings', 'WPTime_preloader_settings_page');
    }
    add_action( 'admin_menu', 'WPTime_preloader_settings' );
    
    function WPTime_preloader_register_settings() {
        register_setting( 'WPTime_preloader_register_setting', 'wptpreloader_bg_color' );
        register_setting( 'WPTime_preloader_register_setting', 'wptpreloader_image' );
        register_setting( 'WPTime_preloader_register_setting', 'wptpreloader_screen' );
    }
    add_action( 'admin_init', 'WPTime_preloader_register_settings' );
        
    function WPTime_preloader_settings_page(){ // settings page function
        if( get_option('wptpreloader_bg_color') ){
            $background_color = get_option('wptpreloader_bg_color');
        }else{
            $background_color = '#FFFFFF';
        }
        
        if( get_option('wptpreloader_image') ){
            $preloader_image = get_option('wptpreloader_image');
        }else{
            $preloader_image = plugins_url( '/images/preloader.GIF', __FILE__ );
        }

        $get_theme = wp_get_theme();
        $theme_name = strtolower( $get_theme->get('Name') );

        if( is_ssl() ){
            $header_file_url = admin_url("theme-editor.php?file=header.php&theme=$theme_name", "https");
        }else{
            $header_file_url = admin_url("theme-editor.php?file=header.php&theme=$theme_name", "http");
        }

        $preloader_element = esc_html('now after <body> insert preloader html element <div id="wptime-plugin-preloader"></div>');
        ?>
            <div class="wrap">
                <h2>Preloader Settings</h2>
                
                <?php if( isset($_GET['settings-updated']) && $_GET['settings-updated'] ){ ?>
                    <div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"> 
                        <p><strong>Settings saved.</strong></p>
                        <button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
                    </div>
                <?php } ?>
                
                <form method="post" action="options.php">
                    <?php settings_fields( 'WPTime_preloader_register_setting' ); ?>
                    
                    <table class="form-table">
                        <tbody>
                        
                            <tr>
                                <th scope="row"><label for="wptpreloader_bg_color">Background Color</label></th>
                                <td>
                                    <input class="regular-text" name="wptpreloader_bg_color" type="text" id="wptpreloader_bg_color" value="<?php echo esc_attr( $background_color ); ?>">
                                    <p class="description">Enter background color code, default color is white #FFFFFF.</p>
                                </td>
                            </tr>
                            
                            <tr>
                                <th scope="row"><label for="wptpreloader_image">Preloader Image</label></th>
                                <td>
                                    <input class="regular-text" name="wptpreloader_image" type="text" id="wptpreloader_image" value="<?php echo esc_attr( $preloader_image ); ?>">
                                    <p class="description">Enter preloader image link, image size must to be 128x128 to be retina ready, <a href="http://preloaders.net" target="_blank">get free preloader image</a>.</p>
                                </td>
                            </tr>
                            
                            <tr>
                                <th scope="row">Display Preloader</th>
                                <td>
                                    <?php
                                        $display_preloader = get_option( 'wptpreloader_screen' );
                                        
                                    ?>
                                    <fieldset>
                                        <legend class="screen-reader-text"><span>Display Preloader</span></legend>
                                        <label title="Display Preloader in full website like home page, posts, pages, categories, tags, attachment, etc..">
                                            <input type="radio" name="wptpreloader_screen" value="full" <?php checked( $display_preloader, 'full' ); ?>>In Full Website
                                        </label>
                                        <br>
                                        <label title="Display Preloader in home page">
                                            <input type="radio" name="wptpreloader_screen" value="homepage" <?php checked( $display_preloader, 'homepage' ); ?>>In Home Page Only
                                        </label>
                                        <br>
                                        <label title="Display Preloader in front page">
                                            <input type="radio" name="wptpreloader_screen" value="frontpage" <?php checked( $display_preloader, 'frontpage' ); ?>>In Front Page Only
                                        </label>
                                        <br>
                                        <label title="Display Preloader in posts only">
                                            <input type="radio" name="wptpreloader_screen" value="posts" <?php checked( $display_preloader, 'posts' ); ?>>In Posts Only
                                        </label>
                                        <br>
                                        <label title="Display Preloader in pages only">
                                            <input type="radio" name="wptpreloader_screen" value="pages" <?php checked( $display_preloader, 'pages' ); ?>>In Pages Only
                                        </label>
                                        <br>
                                        <label title="Display Preloader in categories only">
                                            <input type="radio" name="wptpreloader_screen" value="cats" <?php checked( $display_preloader, 'cats' ); ?>>In Categories Only
                                        </label>
                                        <br>
                                        <label title="Display Preloader in tags only">
                                            <input type="radio" name="wptpreloader_screen" value="tags" <?php checked( $display_preloader, 'tags' ); ?>>In Tags Only
                                        </label>
                                        <br>
                                        <label title="Display Preloader in attachment only">
                                            <input type="radio" name="wptpreloader_screen" value="attachment" <?php checked( $display_preloader, 'attachment' ); ?>>In Attachment Only
                                        </label>
                                        <br>
                                        <label title="Display Preloader in 404 error page">
                                            <input type="radio" name="wptpreloader_screen" value="404error" <?php checked( $display_preloader, '404error' ); ?>>In 404 Error Page Only
                                        </label>
                                    </fieldset>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row"><label>Preloader Element</label></th>
                                <td>
                                    <p class="description">Open <a target="_blank" href="<?php echo $header_file_url; ?>">header.php</a> file for your theme, <?php echo $preloader_element; ?></p>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                    
                    <p class="submit"><input id="submit" class="button button-primary" type="submit" name="submit" value="Save Changes"></p>
                </form>
                
                <div class="tool-box">
                    <h3 class="title">Recommended Links</h3>
                    <p>Get collection of 87 WordPress themes for $69 only, a lot of features and free support! <a href="http://j.mp/ET_WPTime_ref_pl" target="_blank">Get it now</a>.</p>
                    <p>See also:</p>
                        <ul>
                            <li><a href="http://j.mp/CM_WPTime" target="_blank">Premium WordPress themes on CreativeMarket.</a></li>
                            <li><a href="http://j.mp/TF_WPTime" target="_blank">Premium WordPress themes on Themeforest.</a></li>
                            <li><a href="http://j.mp/CC_WPTime" target="_blank">Premium WordPress plugins on Codecanyon.</a></li>
                        </ul>
                    <p><a href="http://j.mp/ET_WPTime_ref_pl" target="_blank"><img src="<?php echo plugins_url( '/banner/570x100.jpg', __FILE__ ); ?>"></a></p>
                </div>
                
            </div>
        <?php
    } // settings page function

?>