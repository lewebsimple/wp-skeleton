<?php

// Initialize ACF Extended
add_action( 'acf/init', 'skeleton_acfe_init' );
function skeleton_acfe_init() {
	// acfe_update_setting( 'dev', true );
	acf_update_setting( 'acfe/modules/block_types', false );
	acf_update_setting( 'acfe/modules/categories', false );
	acf_update_setting( 'acfe/modules/options_pages', false );
}
