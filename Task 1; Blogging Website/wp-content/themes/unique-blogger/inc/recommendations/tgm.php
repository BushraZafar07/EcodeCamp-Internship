<?php

require get_template_directory() . '/inc/recommendations/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function unique_blogger_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Mizan Demo Importor', 'unique-blogger' ),
			'slug'             => 'mizan-demo-importer',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Royal Elementor Addons and Templates', 'unique-blogger' ),
			'slug'             => 'royal-elementor-addons',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Unlimited Elements For Elementor', 'unique-blogger' ),
			'slug'             => 'unlimited-elements-for-elementor',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	unique_blogger_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'unique_blogger_register_recommended_plugins' );