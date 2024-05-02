<?php
/*
        _          _      _                  _             _          _                    _           _            _          
       / /\       /\ \   /\_\               /\ \          /\ \       /\ \                 /\ \        /\ \         / /\        
      / /  \      \_\ \ / / /         _    /  \ \____     \ \ \     /  \ \               /  \ \      /  \ \       / /  \       
     / / /\ \__   /\__ \\ \ \__      /\_\ / /\ \_____\    /\ \_\   / /\ \ \             / /\ \ \    / /\ \ \     / / /\ \      
    / / /\ \___\ / /_ \ \\ \___\    / / // / /\/___  /   / /\/_/  / / /\ \ \   ____    / / /\ \_\  / / /\ \ \   / / /\ \ \     
    \ \ \ \/___// / /\ \ \\__  /   / / // / /   / / /   / / /    / / /  \ \_\/\____/\ / / /_/ / / / / /  \ \_\ / / /  \ \ \    
     \ \ \     / / /  \/_// / /   / / // / /   / / /   / / /    / / /   / / /\/____\// / /__\/ / / / /   / / // / /___/ /\ \   
 _    \ \ \   / / /      / / /   / / // / /   / / /   / / /    / / /   / / /        / / /_____/ / / /   / / // / /_____/ /\ \  
/_/\__/ / /  / / /      / / /___/ / / \ \ \__/ / /___/ / /__  / / /___/ / /        / / /\ \ \  / / /___/ / // /_________/\ \ \ 
\ \/___/ /  /_/ /      / / /____\/ /   \ \___\/ //\__\/_/___\/ / /____\/ /        / / /  \ \ \/ / /____\/ // / /_       __\ \_\
 \_____\/   \_\/       \/_________/     \/_____/ \/_________/\/_________/         \/_/    \_\/\/_________/ \_\___\     /____/_/
                                                                                                                               
                                                       
*************************************** WELCOME TO PICOSTRAP ***************************************

********************* THE BEST WAY TO EXPERIENCE SASS, BOOTSTRAP AND WORDPRESS *********************

    PLEASE WATCH THE VIDEOS FOR BEST RESULTS:
    https://www.youtube.com/playlist?list=PLtyHhWhkgYU8i11wu-5KJDBfA9C-D4Bfl

*/


// DE-ENQUEUE PARENT THEME BOOTSTRAP JS BUNDLE
add_action( 'wp_print_scripts', function(){
    wp_dequeue_script( 'bootstrap5' );
    //wp_dequeue_script( 'dark-mode-switch' );  //optionally
}, 100 );

// ENQUEUE THE BOOTSTRAP JS BUNDLE (AND EVENTUALLY MORE LIBS) FROM THE CHILD THEME DIRECTORY
add_action( 'wp_enqueue_scripts', function() {
    //enqueue js in footer, defer
    wp_enqueue_script( 'studio-roa', get_stylesheet_directory_uri() . "/js/bootstrap.bundle.min.js", array(), null, array('strategy' => 'defer', 'in_footer' => true)  );
    
    //optional: lottie (maybe...)
    //wp_enqueue_script( 'lottie-player', 'https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js', array(), null, array('strategy' => 'defer', 'in_footer' => true)  );

    //optional: rellax 
    //wp_enqueue_script( 'rellax', 'https://cdnjs.cloudflare.com/ajax/libs/rellax/1.12.1/rellax.min.js', array(), null, array('strategy' => 'defer', 'in_footer' => true)  );

}, 101);

    
    
// ENQUEUE YOUR CUSTOM JS FILES, IF NEEDED 
add_action( 'wp_enqueue_scripts', function() {	   
    
    //UNCOMMENT next row to include the js/custom.js file globally
    //wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js', array(/* 'jquery' */), null, array('strategy' => 'defer', 'in_footer' => true) ); 

    //UNCOMMENT next 3 rows to load the js file only on one page
    //if (is_page('mypageslug')) {
    //    wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js', array(/* 'jquery' */), null, array('strategy' => 'defer', 'in_footer' => true) ); 
    //}  

}, 102);

// OPTIONAL: ADD MORE NAV MENUS
//register_nav_menus( array( 'third' => __( 'Third Menu', 'picostrap' ), 'fourth' => __( 'Fourth Menu', 'picostrap' ), 'fifth' => __( 'Fifth Menu', 'picostrap' ), ) );
// THEN USE SHORTCODE:  [lc_nav_menu theme_location="third" container_class="" container_id="" menu_class="navbar-nav"]


// CHECK PARENT THEME VERSION as Bootstrap 5.2 requires an updated SCSSphp, so picostrap5 v2 is required
add_action( 'admin_notices', function  () {
    if( (pico_get_parent_theme_version())>=3.0) return; 
	$message = __( 'This Child Theme requires at least Picostrap Version 3.0.0  in order to work properly. Please update the parent theme.', 'picostrap' );
	printf( '<div class="%1$s"><h1>%2$s</h1></div>', esc_attr( 'notice notice-error' ), esc_html( $message ) );
} );

// FOR SECURITY: DISABLE APPLICATION PASSWORDS. Remove if needed (unlikely!)
add_filter( 'wp_is_application_passwords_available', '__return_false' );

// ADD YOUR CUSTOM PHP CODE DOWN BELOW /////////////////////////

