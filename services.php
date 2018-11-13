
<?php
/*
Plugin Name:Services
Plugin URI: https://akismet.com/
Description:This plugin is used only for Services.
Version:0.1
Author:Most.Sahana Akter
Author URI:https://sahanashelly.wordpress.com/
License: GPLv2 or later
Text Domain:Services
*/
defined('ABSPATH') or die("hey waht are you doing here");
include 'service_shortcode.php';
add_image_size( 'service-img', 600, 300, true );

class ServicePlugin
{
    function __construct(){

        add_action('init', (array($this, 'create_post_type')));
        add_filter('manage_service_posts_columns', (array($this, 'manage_service_posts_columns_function')));
        add_action('manage_service_posts_custom_column', (array($this, 'manage_service_posts_custom_column_function')), 10, 2);

    }

    function create_post_type()
    {
        register_post_type('service',
            array(
                'labels' => array(
                    'name' => __('Services'),
                    'singular_name' => __('Service')
                ),
                'public' => true,
                'has_archive' => true,
                'supports' => array('title', 'editor','custom-fields', 'thumbnail')
            )
        );
    }

    function manage_service_posts_columns_function($columns)
    {
        $newColumns['cb'] = $columns['cb'];
        $newColumns['title'] = $columns['title'];
        $newColumns['author'] = $columns['author'];
        $newColumns['categories'] = $columns['categories'];

        $newColumns['description'] = "Description";
        $newColumns['photo'] = "Photo";
        $newColumns['icon']="icon";
        $newColumns['date'] = $columns['date'];
        return $newColumns;
    }
    function manage_service_posts_custom_column_function($column, $post_id)
    {

        if ('description' === $column) {
            echo get_the_content($post_id);
        }
        if ('photo' === $column) {
            echo get_the_post_thumbnail($post_id, array(80, 80));
        }


    }


}
$sahanaplugin = new ServicePlugin();

