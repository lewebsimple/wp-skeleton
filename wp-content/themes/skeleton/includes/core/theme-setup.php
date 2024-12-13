<?php

// Setup theme
add_action( 'after_setup_theme', 'skeleton_after_setup_theme' );
function skeleton_after_setup_theme() {
	// Load textdomain
	load_theme_textdomain( 'skeleton', get_theme_file_path( 'languages' ) );

	// Theme features
	add_theme_support( 'custom-logo' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	// add_theme_support( 'woocommerce' );
	remove_theme_support( 'core-block-patterns' );

	// Register menus

	// Register sidebars
}

// Disable unwanted permalinks
add_action( 'template_redirect', 'skeleton_disable_permalinks' );
function skeleton_disable_permalinks() {
	global $wp_query;
	if ( is_author() || is_attachment() || is_date() || is_search() ) {
		$wp_query->set_404();
		status_header( 404 );
	}
}

// Customize archive title
add_filter( 'get_the_archive_title', 'skeleton_archive_title' );
function skeleton_archive_title( $title ) {
	if ( is_404() ) {
		$title = __( "Page not found", 'skeleton' );
	} elseif ( is_search() ) {
		$title = sprintf( __( "Search results for '<em>%s</em>'", 'skeleton' ), get_search_query() );
	} elseif ( is_category() || is_tag() || is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_home() ) {
		$title = __( "Latest news", 'skeleton' );
	} elseif ( is_post_type_archive() ) {
		$title = get_post_type_object( get_post_type() )->labels->all_items;
	}
	return $title;
}
