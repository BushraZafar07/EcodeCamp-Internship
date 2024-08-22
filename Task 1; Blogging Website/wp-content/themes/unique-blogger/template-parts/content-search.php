<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package unique_blogger
 */
$unique_blogger_archive_layout = unique_blogger_get_option( 'unique_blogger_archive_layout' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php $unique_blogger_archive_layout = unique_blogger_get_option( 'unique_blogger_archive_layout' );
		$unique_blogger_show_post_image = unique_blogger_get_option( 'unique_blogger_show_post_featured_image_setting' );
		if ( true === $unique_blogger_show_post_image ) { ?>
			<div class="blog-img">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php
					$unique_blogger_archive_image           = unique_blogger_get_option( 'unique_blogger_archive_image' );
					$unique_blogger_archive_image_alignment = unique_blogger_get_option( 'unique_blogger_archive_image_alignment' );
					?>
					<?php if ( 'disable' !== $unique_blogger_archive_image ) : ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( esc_attr( $unique_blogger_archive_image ), array( 'class' => 'align'. esc_attr( $unique_blogger_archive_image_alignment ) ) ); ?></a>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		<?php }?>
		<div class="entry-content-wrapper">
			<?php unique_blogger_entry_meta_date(); ?>
			<?php $unique_blogger_show_post_heading = unique_blogger_get_option( 'unique_blogger_show_post_heading_setting' );
			if ( true === $unique_blogger_show_post_heading ) { ?>
				<header class="entry-header">
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				</header>
			<?php } ?>
			<footer class="entry-footer">
				<?php unique_blogger_entry_footer(); ?>
			</footer>
		</div>
		<?php $unique_blogger_show_post_content = unique_blogger_get_option( 'unique_blogger_show_post_content_setting' );
		if ( true === $unique_blogger_show_post_content ) { ?>
			<div class="text-content">
				<?php if ( 'full' === $unique_blogger_archive_layout ) : ?>
					<?php
					the_content( sprintf(
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'unique-blogger' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );
					?>
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'unique-blogger' ),
							'after'  => '</div>',
						) );
					?>
			    <?php else : ?>
					<?php the_excerpt(); ?>
			    <?php endif; ?>
			</div>
		<?php } ?>
</article>
