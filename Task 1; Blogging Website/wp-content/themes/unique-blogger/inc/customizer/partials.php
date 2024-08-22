<?php
/**
 * Customizer partials.
 *
 * @package unique_blogger
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unique_blogger_customize_partial_blogname() {

	bloginfo( 'name' );

}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unique_blogger_customize_partial_blogdescription() {

	bloginfo( 'description' );

}

/**
 * Partial for copyright text.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unique_blogger_render_partial_copyright_text() {

	$unique_blogger_copyright_text = unique_blogger_get_option( 'unique_blogger_copyright_text' );
	$unique_blogger_copyright_text = apply_filters( 'unique_blogger_filter_copyright_text', $unique_blogger_copyright_text );
	if ( ! empty( $unique_blogger_copyright_text ) ) {
		$unique_blogger_copyright_text = wp_kses_data( $unique_blogger_copyright_text );
	}
	echo $unique_blogger_copyright_text;

}
