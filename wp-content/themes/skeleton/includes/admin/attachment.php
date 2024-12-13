<?php

// Filter media library for current user except administrators and editors
add_filter( 'ajax_query_attachments_args', 'skeleton_ajax_query_attachments_args' );
function skeleton_ajax_query_attachments_args( $query ) {
	if ( kaliroots_user_has_role( 'administrator' ) || kaliroots_user_has_role( 'editor' ) ) {
		return $query;
	}
	if ( $user_id = get_current_user_id() ) {
		$query['author'] = $user_id;
	}
	return $query;
}
