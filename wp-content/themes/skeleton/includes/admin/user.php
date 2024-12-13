<?php

// Disable user contact methods
add_filter( 'user_contactmethods', '__return_empty_array' );

// Hide user profile fields
add_action( 'admin_head', 'skeleton_admin_head_hide_profile' );
function skeleton_admin_head_hide_profile() {
	global $pagenow;
	if ( ! in_array( $pagenow, array( 'profile.php', 'user-edit.php', 'user-new.php' ) ) ) {
		return;
	}
	?>
	<style>
	tr.user-rich-editing-wrap,
	tr.user-syntax-highlighting-wrap,
	tr.user-admin-color-wrap,
	tr.user-comment-shortcuts-wrap,
	tr.user-admin-bar-front-wrap,
	tr.user-url-wrap,
	tr.user-description-wrap,
	tr.user-profile-picture,
	tr.user-nickname-wrap,
	tr:has(input#url) {
		display: none;
	}
	</style>
	<?php
}
