<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package unique_blogger
 */

if ( ! function_exists( 'unique_blogger_skip_to_content' ) ) :
	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function unique_blogger_skip_to_content() {
	?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'unique-blogger' ); ?></a><?php
	}
endif;

add_action( 'unique_blogger_action_before', 'unique_blogger_skip_to_content', 15 );

// Middle Header

if ( ! function_exists( 'unique_blogger_site_branding' ) ) :

	/**
	 * Site branding.
	 *
	 * @since 1.0.0
	 */
	function unique_blogger_site_branding() {
		$unique_blogger_subscribe_button_link = unique_blogger_get_option( 'unique_blogger_subscribe_button_link' );
		$unique_blogger_subscribe_button_text = unique_blogger_get_option( 'unique_blogger_subscribe_button_text' );
		$unique_blogger_data_sticky = unique_blogger_get_option( 'unique_blogger_show_data_sticky_setting' );
		$unique_blogger_date_show = unique_blogger_get_option( 'unique_blogger_date_show' );

		$unique_blogger_header_social_facebook_link = unique_blogger_get_option( 'unique_blogger_header_social_facebook_link' );
		$unique_blogger_header_social_twitter_link = unique_blogger_get_option( 'unique_blogger_header_social_twitter_link' );
		$unique_blogger_header_social_instagram_link = unique_blogger_get_option( 'unique_blogger_header_social_instagram_link' );
		$unique_blogger_header_social_youtube_link = unique_blogger_get_option( 'unique_blogger_header_social_youtube_link' );
		$unique_blogger_header_social_pintrest_link = unique_blogger_get_option( 'unique_blogger_header_social_pintrest_link' );

		?>

	<header class="main-header">
		<div id="middle-header" data-sticky= "<?php echo esc_attr($unique_blogger_data_sticky); ?>">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6 col-6 align-self-center text-lg-start p-md-0">
						<?php if ( true == $unique_blogger_date_show ) :  ?>
							<div class="news-date my-2">
							<span class="dashicons dashicons-calendar-alt"></span>
								<span><?php echo esc_html( wp_date( 'd-m-y' ) ); ?></span>
							</div>
						<?php endif; ?>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-4 col-4 align-self-center text-md-start">
						<div class="toggle-menu gb_menu text-md-end my-2 text-start">
							<button onclick="unique_blogger_gb_Menu_open()" class="gb_toggle"><span class="dashicons dashicons-menu-alt"></span></button>
						</div>
						<div id="gb_responsive" class="nav side_gb_nav">
							<nav id="top_gb_menu" class="gb_nav_menu" role="navigation" aria-label="<?php esc_attr_e( 'Menu', 'unique-blogger' ); ?>">
								<?php
									wp_nav_menu( array( 
										'theme_location' => 'primary-menu',
										'container_class' => 'gb_navigation clearfix' ,
										'menu_class' => 'gb_navigation clearfix',
										'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav m-0 px-0">%3$s</ul>',
										'fallback_cb' => 'wp_page_menu',
									) );
								?>
								<a href="javascript:void(0)" class="closebtn gb_menu" onclick="unique_blogger_gb_Menu_close()">x<span class="screen-reader-text"><?php esc_html_e('Close Menu','unique-blogger'); ?></span></a>
							</nav>
						</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-2 col-2 align-self-center text-md-end text-center">
						<div class="search-container">
							<button type="button" class="search-container-button"><span class="dashicons dashicons-search"></span></button>
						</div>
						<div class="external-search">
							<div class="internal-search">
								<?php get_search_form(); ?>
							</div>
							<button type="button" class="closepop search-container-button-close" ><span class="dashicons dashicons-no"></span></button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-header py-2 mx-lg-4 mx-xl-5 mx-md-0">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-12 align-self-center  social-links text-lg-start text-center ps-0">
						<?php if( !empty($unique_blogger_header_social_facebook_link) ):?>
							<a href="<?php echo esc_url($unique_blogger_header_social_facebook_link);?>" target="_blank"><span class="dashicons dashicons-facebook-alt"></span></a>
						<?php endif; ?>
						<?php if( !empty($unique_blogger_header_social_twitter_link) ):?>
							<a href="<?php echo esc_url($unique_blogger_header_social_twitter_link);?>" target="_blank" ><span class="dashicons dashicons-twitter"></span></a>
						<?php endif; ?>
						<?php if( !empty($unique_blogger_header_social_instagram_link) ):?>
							<a href="<?php echo esc_url($unique_blogger_header_social_instagram_link);?>" target="_blank" ><span class="dashicons dashicons-instagram"></span></a>
						<?php endif; ?>
						<?php if( !empty($unique_blogger_header_social_youtube_link) ):?>
							<a href="<?php echo esc_url($unique_blogger_header_social_youtube_link);?>" target="_blank" ><span class="dashicons dashicons-youtube"></span></a>
						<?php endif; ?>
						<?php if( !empty($unique_blogger_header_social_pintrest_link) ):?>
							<a href="<?php echo esc_url($unique_blogger_header_social_pintrest_link);?>" target="_blank" ><span class="dashicons dashicons-pinterest"></span></a>
						<?php endif; ?>
					</div>
					<div class="col-lg-4 col-md-4 col-12 align-self-center text-center">
						<div class="site-branding mb-3 mb-lg-0">
							<?php unique_blogger_the_custom_logo(); ?>
							<?php $unique_blogger_show_title = unique_blogger_get_option( 'unique_blogger_show_title' ); ?>
							<?php $unique_blogger_show_tagline = unique_blogger_get_option( 'unique_blogger_show_tagline' ); ?>
							<?php if ( true === $unique_blogger_show_title || true === $unique_blogger_show_tagline ) :  ?>
								<div id="site-identity" class="text-center text-md-center">
									<?php if ( true === $unique_blogger_show_title ) :  ?>
										<?php if ( is_front_page() ) : ?>
											<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
										<?php else : ?>
											<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
										<?php endif; ?>
									<?php endif; ?>
									<?php if ( true === $unique_blogger_show_tagline ) :  ?>
										<p class="site-description"><?php bloginfo( 'description' ); ?></p>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-12 align-self-center text-lg-end text-md-end text-center">
						<?php if( !empty($unique_blogger_subscribe_button_link) || !empty($unique_blogger_subscribe_button_text)):?>
							<div class="subscribe-btn my-2">
								<a href="<?php echo esc_url($unique_blogger_subscribe_button_link);?>"><?php echo esc_html($unique_blogger_subscribe_button_text);?></a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</header>

	<?php

	}

endif;

add_action( 'unique_blogger_action_header', 'unique_blogger_site_branding' );


/////////////////////////////////// copyright start /////////////////////////////

if ( ! function_exists( 'unique_blogger_footer_copyright' ) ) :

	/**
	 * Footer copyright
	 *
	 * @since 1.0.0
	 */
	function unique_blogger_footer_copyright() {

		// Check if footer is disabled.
		$unique_blogger_footer_status = apply_filters( 'unique_blogger_filter_footer_status', true );
		if ( true !== $unique_blogger_footer_status ) {
			return;
		}

		// Copyright content.
		$unique_blogger_copyright_text = unique_blogger_get_option( 'unique_blogger_copyright_text' );
		$unique_blogger_copyright_text = apply_filters( 'unique_blogger_filter_copyright_text', $unique_blogger_copyright_text );
		if ( ! empty( $unique_blogger_copyright_text ) ) {
			$unique_blogger_copyright_text = wp_kses_data( $unique_blogger_copyright_text );
		}

		// Powered by content.
		$unique_blogger_powered_by_text = sprintf( __( 'Unique Blogger by %s', 'unique-blogger' ), '<span>' . __( 'Mizan Themes', 'unique-blogger' ) . '</span>' );
		?>

		<div class="colophon-inner">
		    <?php if ( ! empty( $unique_blogger_copyright_text ) ) : ?>
			    <div class="colophon-column">
			    	<div class="copyright">
			    		<?php echo $unique_blogger_copyright_text; ?>
			    	</div><!-- .copyright -->
			    </div><!-- .colophon-column -->
		    <?php endif; ?>

		    <?php if ( ! empty( $unique_blogger_powered_by_text ) ) : ?>
			    <div class="colophon-column">
			    	<div class="site-info">
						<a href="<?php echo esc_url('https://www.mizanthemes.com/products/free-blogger-wordpress-theme/','unique-blogger'); ?>"><?php echo $unique_blogger_powered_by_text; ?></a>
			    	</div><!-- .site-info -->
			    </div><!-- .colophon-column -->
		    <?php endif; ?>
		</div><!-- .colophon-inner -->
		
	    <?php
	}

endif;

add_action( 'unique_blogger_action_footer', 'unique_blogger_footer_copyright', 10 );

// /////////////////////////////////sidebar//////////////////

if ( ! function_exists( 'unique_blogger_add_sidebar' ) ) :

	/**
	 * Add sidebar.
	 *
	 * @since 1.0.0
	 */
	function unique_blogger_add_sidebar() {

		global $post;

		$unique_blogger_global_layout = unique_blogger_get_option( 'unique_blogger_global_layout' );
		$unique_blogger_global_layout = apply_filters( 'unique_blogger_filter_theme_global_layout', $unique_blogger_global_layout );

		// Check if single.
		if ( $post && is_singular() ) {
			$unique_blogger_post_options = get_post_meta( $post->ID, 'unique_blogger_theme_settings', true );
			if ( isset( $unique_blogger_post_options['post_layout'] ) && ! empty( $unique_blogger_post_options['unique_blogger_post_layout'] ) ) {
				$unique_blogger_global_layout = $unique_blogger_post_options['unique_blogger_post_layout'];
			}
		}

		// Include primary sidebar.
		if ( 'no-sidebar' !== $unique_blogger_global_layout ) {
			get_sidebar();
		}
		// Include Secondary sidebar.
		switch ( $unique_blogger_global_layout ) {
			case 'three-columns':
			get_sidebar( 'secondary' );
			break;

			default:
			break;
		}

		// Include Secondary sidebar 1.
		switch ( $unique_blogger_global_layout ) {
			case 'four-columns':
			get_sidebar( 'secondary' );
			break;

			default:
			break;
		}

	}

endif;

add_action( 'unique_blogger_action_sidebar', 'unique_blogger_add_sidebar' );

//////////////////////////////////////// single page


if ( ! function_exists( 'unique_blogger_add_image_in_single_display' ) ) :

	/**
	 * Add image in single post.
	 *
	 * @since 1.0.0
	 */
	function unique_blogger_add_image_in_single_display() {

		global $post;

		if ( has_post_thumbnail() ) {

			$values = get_post_meta( $post->ID, 'unique_blogger_theme_settings', true );
			$unique_blogger_theme_settings_single_image = isset( $values['unique_blogger_single_image'] ) ? esc_attr( $values['unique_blogger_single_image'] ) : '';

			if ( ! $unique_blogger_theme_settings_single_image ) {
				$unique_blogger_theme_settings_single_image = unique_blogger_get_option( 'unique_blogger_single_image' );
			}

			if ( 'disable' !== $unique_blogger_theme_settings_single_image ) {
				$args = array(
					'class' => 'aligncenter',
				);
				the_post_thumbnail( esc_attr( $unique_blogger_theme_settings_single_image ), $args );
			}
		}

	}

endif;

add_action( 'unique_blogger_single_image', 'unique_blogger_add_image_in_single_display' );

if ( ! function_exists( 'unique_blogger_footer_goto_top' ) ) :

	/**
	 * Go to top.
	 *
	 * @since 1.0.0
	 */
	function unique_blogger_footer_goto_top() {
        
        $unique_blogger_show_scroll_to_top = unique_blogger_get_option( 'unique_blogger_show_scroll_to_top' );
        if ( true === $unique_blogger_show_scroll_to_top ) :
		echo '<a href="#page" class="scrollup" id="btn-scrollup"><i class="fa fa-angle-up"><span class="screen-reader-text">' . esc_html__( 'Scroll Up', 'unique-blogger' ) . '</span></i></a>';
		endif;

	}

endif;

add_action( 'unique_blogger_action_after', 'unique_blogger_footer_goto_top', 20 );