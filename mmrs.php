<?php
/*
Plugin Name: Head/footer
Plugin URI: https://github.com/david-le-fou
Description: header & footer mmrs
Author: David le fou
Version: 1.0.0
*/
define('VER','1.0.0');
define('directory','/wp-content/plugins/mmrs');
function addCss(){
	wp_enqueue_style( 'style',directory.'/css/style.css','',VER );
}
add_action("wp_enqueue_scripts", "addCss");
function addjquery(){
	wp_enqueue_script( 'script_jquery',directory.'/js/jquery.js','',VER );
}
add_action("wp_enqueue_scripts", "addjquery");
function addjs(){
	wp_enqueue_script( 'script',directory.'/js/script.js','',VER );
}
add_action("wp_enqueue_scripts", "addjs");
function add_js(){
	wp_enqueue_script( 'script_slide',directory.'/slide_enjana/js/jssor.slider-28.1.0.min.js','',VER );
}
add_action("wp_enqueue_scripts", "add_js");
function add_js_slide(){
	wp_enqueue_script( 'script_slide_show',directory.'/slide_enjana/js/slide_init.js','',VER );
}
add_action("wp_enqueue_scripts", "add_js_slide");

function wppln_mes_menus() {
    register_nav_menu('menu-mmrs',__( 'Menu mmrs' ));
}
    add_action( 'init', 'wppln_mes_menus' );
function mon_menu(){
    wp_nav_menu( array( 
        'theme_location' => 'menu-mmrs', 
        'container_class' => 'menu-mmrs enjana',
        'container_id' => 'nav-menu-mmrs',
        'menu_id' => 'id-menu-mmrs'));
}
function header_enjana(){
    $texte = "<div class='mon_header'>";
    $texte .= "</div>";
    $texte .= mon_menu();
    echo $texte;
}
add_action('wp_head','header_enjana');
function footer_enjana(){
    $texte = "<hr><div class='footer'>";
    $texte .="<img class='logo_mmrs logo' src=".plugin_dir_url(__FILE__)."img_logo/mmrs.jpeg>";
    $texte .="<div class='text-footer'><p class ='email'><a href='mailto:contact@mmrs.gov.mg'>contact@mmrs.gov.mg</a></p>";
    $texte .="</div>";
    $texte .="</div>";
    $texte .="<p class='copy'> &copy; Copyrigth 20".date("y")."</p>";
    echo $texte;
}
add_action('wp_footer','footer_enjana');