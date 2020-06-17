<?php

class Project_Model_Example{

    private $post_type_name;
    private $post_type_singular;
    private $post_type_plural;
    private $template_parser;
    private $menu_icon;

    function __construct( $template_parser ) {
        $this->template_parser = $template_parser;
        $this->post_type_name = 'project-example';
        $this->post_type_singular = 'Example';
        $this->post_type_plural = 'Examples';
        $this->menu_icon = 'dashicons-list-view';

        add_action( 'init', array( $this, 'create_post_type' ) );
        add_action( 'cmb2_admin_init', array( $this, 'add_meta_boxes' ) );

        add_action( 'wp_enqueue_scripts', array( $this, 'load_frontend_scripts' )  );
        add_action( 'wp_enqueue_scripts', array( $this, 'load_frontend_styles' )  );

        add_action( 'admin_print_styles-post.php', array( $this, 'load_admin_styles' ), 1000 );
        add_action( 'admin_print_styles-post-new.php', array( $this, 'load_admin_styles' ), 1000 );

        add_action( 'admin_print_scripts-post.php', array( $this, 'load_admin_scripts' ), 1000 );
        add_action( 'admin_print_scripts-post-new.php', array( $this, 'load_admin_scripts' ), 1000 );
    }

    function create_post_type(){

        $labels = array(
            'name' => sprintf( _x( '%s', 'post type general name'), $this->post_type_plural ),
            'singular_name' => sprintf( _x( '%s', 'post type singular name'), $this->post_type_singular ),
            'add_new' => _x( 'Agregar Nuevo', $this->post_type_singular),
            'add_new_item' => sprintf('Nuevo %s', $this->post_type_singular ),
            'edit_item' => sprintf('Editar %s', $this->post_type_singular ),
            'new_item' => sprintf('Agregar %s', $this->post_type_singular ),
            'all_items' => sprintf('%s', $this->post_type_plural ),
            'view_item' => sprintf('Ver %s', $this->post_type_singular ),
            'search_items' => sprintf('Buscar %a', $this->post_type_plural ),
            'not_found' => sprintf('No %s Encontrados', $this->post_type_plural ),
            'not_found_in_trash' => sprintf('No %s Encontrados en la Papelera', $this->post_type_plural ),
            'parent_item_colon' => '',
            'menu_name' => $this->post_type_plural,
        );

        $args = array(
            'labels' => $labels,
            'description'         =>  'Description',
            'supports'            => array( 'title', 'editor', 'thumbnail' ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 4,
            'menu_icon'           =>  $this->menu_icon,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
        );

        register_post_type( $this->post_type_name, $args );
    }

    function metabox_services(){
        $prefix = 'example_'; 
        $cmb = new_cmb2_box( array(
            'id'           => $prefix . 'media',
            'title'        =>  'Media',
            'object_types' => array( $this->post_type_name, ), // Post type
            'context'      => 'normal',
            'priority'     => 'high',
            'show_names'   => true, // Show field names on the left
        ) );
        
        $prefix = $prefix . 'media_';
        $cmb->add_field( array(
            'name'    =>  'Imagen',
            'id'      => $prefix . 'thumbnail',
            'type'    => 'file',
        ) );
        $cmb->add_field( array(
            'name'    =>  'Icono',
            'id'      => $prefix . 'icon',
            'type'    => 'file',
        ) );
    }

    function add_meta_boxes(){
        $this->metabox_services();
    }

    function load_admin_styles(){

        global $post_type;

        if($this->post_type_name != $post_type){
            return;
        }
    }

    function load_frontend_styles(){

        global $post_type;

        if($this->post_type_name != $post_type){
            return;
        }
    }

    function load_admin_scripts(){

        global $post_type;

        if($this->post_type_name != $post_type){
            return;
        }
    }

    function load_frontend_scripts(){

        global $post_type;

        if($this->post_type_name != $post_type){
            return;
        }
    }
}