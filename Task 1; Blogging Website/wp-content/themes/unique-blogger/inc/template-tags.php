<?php
/**
 * Custom template tags for this theme.
 *
 * @package unique_blogger
 */

if ( ! function_exists( 'unique_blogger_entry_footer' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function unique_blogger_entry_footer() {

		$unique_blogger_show_meta_author = true;
		if ( 'post' === get_post_type() ) {
			$posted_on = '';
			if ( is_single() ) {
				$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
				if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
					$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
				}

				$time_string = sprintf( $time_string,
					esc_attr( get_the_date( 'c' ) ),
					esc_html( get_the_date() ),
					esc_attr( get_the_modified_date( 'c' ) ),
					esc_html( get_the_modified_date() )
				);

				$posted_on = sprintf(
					'%s',
					'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
				);
			}
			if ( ! empty( $posted_on ) ) {
				echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
			}

			$byline = '';
			$unique_blogger_show_post_admin = unique_blogger_get_option( 'unique_blogger_show_post_admin_setting' );
			if ( true === $unique_blogger_show_meta_author ) {
				if ( true === $unique_blogger_show_post_admin ) { 
					$byline = sprintf(
						'%s',
						'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
					);
				}
			}
			if ( ! empty( $byline ) ) {
				echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
			}

		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			$unique_blogger_show_post_comments = unique_blogger_get_option( 'unique_blogger_show_post_comments_setting' );
			if ( true === $unique_blogger_show_post_comments) { 
				$unique_blogger_show_meta_comment = true;
				if ( true === $unique_blogger_show_meta_comment ) {
					echo '<span class="comments-link">';
					comments_popup_link( esc_html__( 'Leave a comment', 'unique-blogger' ), esc_html__( '1 Comment', 'unique-blogger' ), esc_html__( '% Comments', 'unique-blogger' ) );
					echo '</span>';
				}
			}
		}

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			$unique_blogger_show_meta_categories = true;
			$unique_blogger_show_post_categories = unique_blogger_get_option( 'unique_blogger_show_post_categories_setting' );
			if ( true === $unique_blogger_show_post_categories) {
				if ( true === $unique_blogger_show_meta_categories ) {
					/* Translators: used between list items, there is a space after the comma. */
					$unique_blogger_categories_list = get_the_category_list( esc_html__( ', ', 'unique-blogger' ) );
					if ( $unique_blogger_categories_list && unique_blogger_categorized_blog() ) {
						printf( '<span class="cat-links">%1$s</span>', $unique_blogger_categories_list ); // WPCS: XSS OK.
					}
				}
			}
			$unique_blogger_show_meta_tags = true;
			$unique_blogger_show_meta_tags = unique_blogger_get_option( 'unique_blogger_show_post_tags_setting' );
			if ( true === $unique_blogger_show_meta_tags) {
				if ( true === $unique_blogger_show_meta_tags ) {
					/* Translators: used between list items, there is a space after the comma. */
					$unique_blogger_tags_list = get_the_tag_list( '', esc_html__( ', ', 'unique-blogger' ) );
					if ( $unique_blogger_tags_list ) {
						printf( '<span class="tags-links">%1$s</span>', $unique_blogger_tags_list ); // WPCS: XSS OK.
					}
				}
			}
		}

		edit_post_link( esc_html__( 'Edit', 'unique-blogger' ), '<span class="edit-link">', '</span>' );
	}
endif;

if ( ! function_exists( 'unique_blogger_entry_meta_date' ) ) :

	/**
	 * Prints HTML with date meta.
	 */
	function unique_blogger_entry_meta_date() {
		?>
		<?php $unique_blogger_show_post_date = unique_blogger_get_option( 'unique_blogger_show_post_date_setting' );
		if ( true === $unique_blogger_show_post_date ) { ?>
			<div class="custom-entry-date">
				<span class="entry-month"><?php the_time( _x( 'M', 'date format', 'unique-blogger' ) ); ?></span>
				<span class="entry-day"><?php the_time( _x( 'd', 'date format', 'unique-blogger' ) ); ?></span>
			</div>
		<?php } ?>
		<?php
	}

endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function unique_blogger_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'unique_blogger_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'unique_blogger_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so unique_blogger_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so unique_blogger_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in unique_blogger_categorized_blog.
 */
function unique_blogger_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'unique_blogger_categories' );
}
add_action( 'edit_category', 'unique_blogger_category_transient_flusher' );
add_action( 'save_post',     'unique_blogger_category_transient_flusher' );

/**
 * Display single taxonomy link.
 *
 * Used inside loop only.
 *
 * @since 1.0.0
 *
 * @param string $taxonomy Taxonomy slug.
 * @param string $before   HTML to place before.
 * @param string $after    HTML to place after.
 * @param int    $post_id  Post ID.
 */
function unique_blogger_the_term_link_single( $taxonomy = 'category', $before = '', $after = '', $post_id = false ) {

	// Bail if post is not related to taxonomy.
	if ( ! is_object_in_taxonomy( get_post_type( $post_id ), $taxonomy ) ) {
		return;
	}

	$post = get_post( $post_id );

	// Bail if not valid post.
	if ( ! is_a( $post, 'WP_Post' ) ) {
		return;
	}

	$terms = wp_get_post_terms( $post->ID, $taxonomy );

	// Bail if no terms available.
	if ( empty( $terms ) ) {
		return;
	}

	// Sort the terms by ID and get the first category.
	if ( function_exists( 'wp_list_sort' ) ) {
		$terms = wp_list_sort( $terms, 'term_id' );
	}
	else {
		usort( $terms, '_usort_terms_by_ID' );
	}

	$term = array_shift( $terms );

	$link = '<a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a>';

	$link = $before . $link . $after;

	echo $link;

}
