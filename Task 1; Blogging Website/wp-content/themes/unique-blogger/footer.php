<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package unique_blogger
 */

	/**
	 * Hook - unique_blogger_action_after_content.
	 *
	 * @hooked unique_blogger_content_end - 10
	 */
	do_action( 'unique_blogger_action_after_content' );
?>

	<?php
	/**
	 * Hook - unique_blogger_action_before_footer.
	 *
	 * @hooked unique_blogger_add_footer_bottom_widget_area - 5
	 * @hooked unique_blogger_footer_start - 10
	 */
	do_action( 'unique_blogger_action_before_footer' );
	?>
    <?php
	  /**
	   * Hook - unique_blogger_action_footer.
	   *
	   * @hooked unique_blogger_footer_copyright - 10
	   */
	  do_action( 'unique_blogger_action_footer' );
	?>
	<?php
	/**
	 * Hook - unique_blogger_action_after_footer.
	 *
	 * @hooked unique_blogger_footer_end - 10
	 */
	do_action( 'unique_blogger_action_after_footer' );
	?>

<?php
	/**
	 * Hook - unique_blogger_action_after.
	 *
	 * @hooked unique_blogger_page_end - 10
	 * @hooked unique_blogger_footer_goto_top - 20
	 */
	do_action( 'unique_blogger_action_after' );
?>

<?php wp_footer(); ?>
</body>
</html>
