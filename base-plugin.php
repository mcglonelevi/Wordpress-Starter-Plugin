<?php
/*
Plugin Name: BASE PLUGIN
Plugin URI: www.yoursite.com
Description: A base plugin meant for extending.
Version: 0.0.1
Author: Levi McGlone
Author URI: www.yoursite.com
*/

class BasePlugin {
  	public function __construct()
    {
        add_action( 'init', array($this, 'init'));

        /**
         *  Uncomment this line to enable a plugin menu page
         */
        // add_action( 'admin_menu', array($this, 'admin_menu'));

        /**
         *  Uncomment this line to enqueue the plugin's styles and scripts
         */
        // add_action( 'wp_enqueue_scripts', array($this, 'enqueue_scripts'));
  	}

    public function init()
    {
        /**
         *  Uncomment this line to enable the custom post type
         */
        //$this->register_base_post_type();
    }

    public function admin_menu()
    {
        add_menu_page( 'Page Title', 'Menu Title', 'administrator', 'base-plugin', array($this, 'display_admin_menu'), 'dashicons-welcome-learn-more', 20 );
    }

    public function display_admin_menu()
    {
        include 'views/admin_menu_view.php';
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script('base-plugin-js', plugin_dir_url( __FILE__ ) . 'js/base-plugin.js', false);
        wp_enqueue_style('base-plugin-css', plugin_dir_url( __FILE__ ) . 'css/base-plugin.css', false);
    }

    public function register_base_post_type() {
        $args = array(
            'label' => 'Base Post Type',
            'labels' => array(
                'singular_name' => 'Base Post Type',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Base Post Type',
                'edit_item' => 'Edit Base Post Type',
                'new_item' => 'New Base Post Type',
                'view_item' => 'View Base Post Type',
                'search_items' => 'Search Base Post Types',
                'not_found' => 'No Base Post Types Found',
                'not_found_in_trash' => 'No Base Post Types Found In Trash',
            ),
            'public' => true,
            'menu_position' => 30,
            'menu_icon' => 'dashicons-admin-site',
            'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' ),
            'taxonomies' => array( 'post_tag', 'link_category' ),
            'has_archive' => true,
            'rewrite' => array(
                'slug' => 'base-post-type',
                'with_front' => false,
            ),
        );
        return register_post_type( 'base-post-type', $args );
    }
}

$basePlugin = new BasePlugin();
