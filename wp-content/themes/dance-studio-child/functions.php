<?php
/**
 * @package 	WordPress
 * @subpackage 	Dance Studio Child
 * @version		1.0.0
 * 
 * Child Theme Functions File
 * Created by CMSMasters
 * 
 */


function dance_studio_child_enqueue_styles() {
    wp_enqueue_style('dance-studio-child-style', get_stylesheet_uri(), array('theme-style'), '1.0.0', 'screen, print');
}

add_action('wp_enqueue_scripts', 'dance_studio_child_enqueue_styles', 11);
?>