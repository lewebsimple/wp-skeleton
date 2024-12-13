<?php

// TODO: Register 'auth' global variable

// TODO: Register 'locales' global variable

// Register 'site_options' global variable
add_action( 'wp_enqueue_scripts', 'skeleton_globals_site_options' );
function skeleton_globals_site_options() {
	$site_options = skeleton_site_options_schema()->parse(
		array(
			'name'        => get_bloginfo( 'name' ),
			'description' => get_bloginfo( 'description' ),
			'contact'     => get_field( 'contact', 'options' ) ?: null,
		)
	);
	kaliroots_register_global_variable( 'site_options', $site_options );
}
