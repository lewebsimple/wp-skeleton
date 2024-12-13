<?php

use DaveARG\Zod\Zod as Z;

// Define siteOptionsSchema
function skeleton_site_options_schema() {
	return Z::object(
		array(
			'name'        => Z::string(),
			'description' => Z::string(),
			'contact'     => skeleton_contact_schema(),
		)
	);
}
