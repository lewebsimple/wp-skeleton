<?php

// Show admin bar for administrators and editors
add_filter( 'show_admin_bar', 'skeleton_show_admin_bar' );
function skeleton_show_admin_bar() {
	return kaliroots_user_has_role( 'administrator' ) || kaliroots_user_has_role( 'editor' );
}

// Prevent users from accessing the dashboard (except administrators and editors)
add_action( 'admin_init', 'skeleton_block_dashboard' );
function skeleton_block_dashboard() {
	if ( ! is_admin() || defined( 'DOING_AJAX' ) || kaliroots_user_has_role( 'administrator' ) || kaliroots_user_has_role( 'editor' ) ) {
		return;
	}
	wp_safe_redirect( home_url() );
	exit;
}
