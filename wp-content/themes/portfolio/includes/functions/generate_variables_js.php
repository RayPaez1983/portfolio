<?php
add_action('wp_head','pluginname_ajaxurl');
function pluginname_ajaxurl() {
    ?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
        var baseurl = '<?php echo site_url(); ?>';
        var theme_url = '<?php echo get_template_directory_uri(); ?>';
    </script>
    <?php
}