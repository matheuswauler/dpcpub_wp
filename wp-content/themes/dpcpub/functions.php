<?php

// Tamanho das imagens
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'banner', 980, 430, true );
}

// Adiciona Excerpt nas paginas
add_post_type_support( 'page', 'excerpt' );

// Remove metatag generator
remove_action('wp_head', 'wp_generator');

// Configura html padrao para HTML 5
add_theme_support( 'html5', array(
	'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
) );

// Adiciona formatos
add_theme_support( 'post-formats', array(
	'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
) );

// Permite atualizar o wordpress sem fornecer o FTP
define('FS_METHOD','direct');

// Remover barra superior
add_filter('show_admin_bar', '__return_false');

// Carrega styles e scripts
function load_scripts() {
	// Load our main stylesheet.
	wp_enqueue_style( 'open_sans', 'http://fonts.googleapis.com/css?family=Lato:300,400,700', array() );
	wp_enqueue_style( 'style', get_stylesheet_uri(), array() );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css', array() );

	wp_enqueue_script( 'jquery_2', get_template_directory_uri() . '/js/jquery.js', array(), '2.1.1', true );
	wp_enqueue_script( 'html5', get_template_directory_uri() . '/js/html5.js', array(), '0', true );
	wp_enqueue_script( 'js_functions', get_template_directory_uri() . '/js/functions.js', array( 'jquery_2' ), '', true );

	wp_dequeue_style( 'woocommerce_chosen_styles' );
	wp_dequeue_script( 'wc-chosen' );
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );
