<?php
/**
 * Default theme options.
 *
 * @package unique_blogger
 */

if ( ! function_exists( 'unique_blogger_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function unique_blogger_get_default_theme_options() {

		$defaults = array();

		//General Option
        $defaults['unique_blogger_show_scroll_to_top']          = true;
        $defaults['unique_blogger_show_preloader_setting']      = false;
        $defaults['unique_blogger_show_data_sticky_setting']    = false;

        //Post Option
        $defaults['unique_blogger_show_post_date_setting']         		 = true;
        $defaults['unique_blogger_show_post_heading_setting']      		 = true;
        $defaults['unique_blogger_show_post_content_setting']       		 = true;
        $defaults['unique_blogger_show_post_admin_setting']         		 = true;
        $defaults['unique_blogger_show_post_categories_setting']    		 = true;
        $defaults['unique_blogger_show_post_comments_setting']    	 	 = true;
        $defaults['unique_blogger_show_post_featured_image_setting']   	 = true;
        $defaults['unique_blogger_show_post_tags_setting']    			 = true;

		// Header.
		$defaults['unique_blogger_show_title']            = true;
		$defaults['unique_blogger_show_tagline']          = false;
		$defaults['unique_blogger_date_show'] 		= true;

		// Layout.
		$defaults['unique_blogger_global_layout']           = 'right-sidebar';
		$defaults['unique_blogger_archive_layout']          = 'excerpt';
		$defaults['unique_blogger_archive_image']           = 'large';
		$defaults['unique_blogger_archive_image_alignment'] = 'center';
		$defaults['unique_blogger_single_image']            = 'large';

		// Home Page.
		$defaults['unique_blogger_home_content_status'] = true;
		
		// 404 page
		$defaults['unique_blogger_404_page_title']  = esc_html__( 'Oops! That page can&rsquo;t be found.', 'unique-blogger' );
		$defaults['unique_blogger_404_page_text']  = esc_html__( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'unique-blogger' );

		// Footer.
		$defaults['unique_blogger_copyright_text']        = esc_html__( 'Copyright &copy; All rights reserved.', 'unique-blogger' );
		
		// Pass through filter.
		$defaults = apply_filters( 'unique_blogger_filter_default_theme_options', $defaults );
		return $defaults;
	}

endif;
