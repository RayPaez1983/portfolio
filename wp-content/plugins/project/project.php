<?php
/*
Plugin Name: Agathos Technology SAS WP Project
Plugin URI: http://agathos.technology
Description: Main Plugin
Author: Agathos Technology SAS
Version: 1.0
Author URI: http://agathos.technology
Text Domain: agathos.technology
Domain Path: /languages
*/

spl_autoload_register('project_autoloader');

function project_autoloader( $class_name ) {

    $class_components = explode( "_", $class_name );

    if ( isset( $class_components[0] ) && $class_components[0] == "Project" &&
        isset( $class_components[1] )) {

        $class_directory = $class_components[1];

        unset( $class_components[0], $class_components[1] );

        $file_name = implode( "_", $class_components );

        $base_path = plugin_dir_path(__FILE__);

        switch ( $class_directory ) {
            case 'Model':

                $file_path = $base_path . "models/class-project-model-".lcfirst( $file_name ) . '.php';
                if ( file_exists( $file_path ) && is_readable( $file_path ) ) {
                    include $file_path;
                }

                break;
        }
    }
}

if ( ! class_exists('Twig_Autoloader') ){
    $base_path_badges = plugin_dir_path(__FILE__);

    require_once $base_path_badges.'Twig/lib/Twig/Autoloader.php';
    Twig_Autoloader::register();
}

class Agathos_Project_Manager{

    public $base_path;


    function __construct(){
        global $project_options;

        if( !$project_options ){
            //return;
        }

        $this->base_path = plugin_dir_path(__FILE__);
        require_once $this->base_path . 'class-twig-initializer.php';
        $this->template_parser = Twig_Initializer_Agathos_Project::initialize_templates();
        // $this->model_services = new Project_Model_Services( $this->template_parser );

        add_action( 'cmb2_admin_init', array( $this, 'add_metaboxes' ) );

        add_action( 'init', array( $this,'textdomain' ) );

    }

    // Function get id page from options project
    function get_page_id_from_project_options( $option = false ){

        global $project_options;

        if( $option === false ){
            return false;
        }

        $pageID = $project_options[$option] ? (int)$project_options[$option]: false;

        $currentLanguagePageID = apply_filters( 'wpml_object_id', $pageID, 'page' );
        return $currentLanguagePageID;

    }

    function get_page_example_id(){
        return $this->get_page_id_from_project_options('home_example_page');
    }

    public function custom_metaboxes(){

        global $project_options;

        $prefix = 'custom';
        /*if ($pageAboutUs) {
            $prefix = $prefix . '_about_us';
            $cmb = new_cmb2_box(array(
                'id'        => $prefix,
                'title'     => 'Configuraciones del Inicio',
                'object_types' => array( 'page' ),
                'show_on'      => array( 'key' => 'id', 'value' => array( $pageAboutUs ) ),
                'context' => 'normal',
                'priority' => 'high',
                'show_names' => true
            ) );
            $cmb->add_field( array(
                'name'    => __( 'Titulo en el Inicio', 'agathostechnology' ),
                'id'      => $prefix . '_title_home',
                'type'    => 'text',
            ) );

            $group_field_id = $cmb->add_field( array(
                'id'          => $prefix . '_group',
                'type'        => 'group',
                'options'     => array(
                    'group_title'   => __( 'Cualidad {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                    'add_button'    => __( 'Añadir otra cualidad', 'cmb2' ),
                    'remove_button' => __( 'Eliminar cualidad', 'cmb2' ),
                    'sortable'      => false, // beta
                    // 'closed'     => true, // true to have the groups closed by default
                ),
            ) );
            
            $prefix = $prefix . '_group';
            $cmb->add_group_field( $group_field_id, array(
                'name' => 'Titulo',
                'id'   => $prefix . '_title',
                'type' => 'text',
                // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
            ) );
            $cmb->add_group_field( $group_field_id, array(
                'name' => 'Imagen',
                'id'   => $prefix . '_thumbnail',
                'type' => 'file',
            ) );
            $cmb->add_group_field( $group_field_id, array(
                'name' => 'Imagen Activa',
                'id'   => $prefix . '_thumbnail_active',
                'type' => 'file',
            ) );
        }*/
    }

    public function add_metaboxes(){
        $this->custom_metaboxes();
    }

}
global $agathosProject;

$agathosProject = new Agathos_Project_Manager();

do_action('agathos_project_initialized');
