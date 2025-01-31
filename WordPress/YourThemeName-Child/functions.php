<?php

// Enqueue parent theme styles and child theme styles 
function my_theme_enqueue_styles()
{
    // Enqueue the parent theme's stylesheet
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    // Enqueue the child theme's stylesheet (this part should also be added)
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
