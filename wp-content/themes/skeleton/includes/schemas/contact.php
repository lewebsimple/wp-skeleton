<?php

use DaveARG\Zod\Zod as Z;

// Define contactSchema
function skeleton_contact_schema() {
	return Z::object(
		array(
			'email' => Z::string()->default( get_option( 'admin_email' ) ),
		)
	)->default( array() );
}
