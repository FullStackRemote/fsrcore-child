<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles', 11) ;
function my_theme_enqueue_styles() {
        wp_dequeue_style('main-style');
        wp_deregister_style('main-style');
        wp_register_style( 'main-style', get_stylesheet_directory_uri() . '/assets/css/styles.css' );
        wp_register_style( 'child-theme-style', get_stylesheet_directory_uri() . '/assets/css/theme-style.css' );
        wp_enqueue_style('child-theme-style');
        wp_enqueue_style('main-style');
        // author page js
        if ( is_author() ) {
            wp_dequeue_script('author-page');
            wp_deregister_script('author-page');
            wp_register_script( 'author-page', get_stylesheet_directory_uri() . '/assets/js/author.js', array(
                'jquery',
                'underscore',
                'backbone',
                'appengine',
                'front'
            ), ET_VERSION, true );
            wp_enqueue_script('author-page');
        }
        /*
         * js working on single project
        */
        if ( is_singular( 'project' ) ) {
            wp_dequeue_script('single-project');
            wp_deregister_script('single-project');
            wp_register_script( 'single-project', get_stylesheet_directory_uri() . '/assets/js/single-project.js', array(
                'jquery',
                'underscore',
                'backbone',
                'appengine',
                'front'
            ), ET_VERSION, true );
            wp_enqueue_script('single-project');
        }
}
//Extend parent theme functionality
require_once dirname(__FILE__) . '/customizer-child/child-functions.php';