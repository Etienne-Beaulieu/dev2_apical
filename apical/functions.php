<?php
function apical_enqueue_styles() {
    // Enqueue the style.css file from your theme directory
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'apical_enqueue_styles');

function apical_enqueue_scripts() {
    // Enqueue your custom script.js file from your theme directory
    wp_enqueue_script('script', get_template_directory_uri() . 'script.js', array('jquery'), null, false);
}
add_action('wp_enqueue_scripts', 'apical_enqueue_scripts');
?>