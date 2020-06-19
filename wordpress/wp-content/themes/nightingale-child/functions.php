<?php 
// Let's change this to `enqueue_child_styles` so it's clearer.
add_action( 'wp_enqueue_scripts', 'enqueue_child_styles' );

// Now the function
function enqueue_child_styles() {
    // Rename the hook to child-style
   wp_enqueue_style( 'child-style', get_stylesheet_directory_uri().'/style.css' );
}