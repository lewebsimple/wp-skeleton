<?php

// Custom editor capabilities
add_action( 'init', 'skeleton_editor_capabilities' );
function skeleton_editor_capabilities() {
	$role = get_role( 'editor' );
	if ( $role->has_cap( 'edit_theme_options' ) ) {
		return;
	}

	// User management
	$role->add_cap( 'edit_users' );
	$role->add_cap( 'list_users' );
	$role->add_cap( 'promote_users' );
	$role->add_cap( 'create_users' );
	$role->add_cap( 'add_users' );
	$role->add_cap( 'delete_users' );

	// Theme options (menus / widgets)
	$role->add_cap( 'edit_theme_options' );
}

// Prevent editors from deleting, editing or adding administrators
add_filter( 'editable_roles', 'skeleton_editor_editable_roles' );
function skeleton_editor_editable_roles( $roles ) {
	if ( isset( $roles['administrator'] ) && ! current_user_can( 'administrator' ) ) {
		unset( $roles['administrator'] );
	}
	return $roles;
}

// Prevent editors from editing administrators
add_filter( 'map_meta_cap', 'skeleton_editor_map_meta_cap', 10, 4 );
function skeleton_editor_map_meta_cap( $caps, $cap, $user_id, $args ) {
	switch ( $cap ) {
		case 'edit_user':
		case 'remove_user':
		case 'promote_user':
			if ( isset( $args[0] ) && (int) $args[0] === (int) $user_id ) {
				break;
			} elseif ( ! isset( $args[0] ) ) {
				$caps[] = 'do_not_allow';
			}
			$other = new WP_User( absint( $args[0] ) );
			if ( $other->has_cap( 'administrator' ) ) {
				if ( ! current_user_can( 'administrator' ) ) {
					$caps[] = 'do_not_allow';
				}
			}
			break;
		case 'delete_user':
		case 'delete_users':
			if ( ! isset( $args[0] ) ) {
				break;
			}
			$other = new WP_User( absint( $args[0] ) );
			if ( $other->has_cap( 'administrator' ) ) {
				if ( ! current_user_can( 'administrator' ) ) {
					$caps[] = 'do_not_allow';
				}
			}
			break;
	}
	return $caps;
}
