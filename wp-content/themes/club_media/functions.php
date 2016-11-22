<?php

//require __DIR__ . '/include/restApi/lib.php';
require_once(dirname(__FILE__) . "/include/restApi/lib.php");





//--------------------------------------------
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );



//---------------------------------------
add_theme_support( 'post-thumbnails' );













?>
