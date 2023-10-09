<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Razia
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-thumbnail">
		<?php razia_post_thumbnail(); ?>
	</div>
	<div class="post-content">
		<?php
		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta post-top">
				<?php 
					razia_posted_on(); 
					razia_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php

			if(is_single( )){
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'razia' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
			}else{
				the_excerpt(); ?>
				<div class="blog-button">
		            <?php
		            echo'<a href="'.esc_url ( get_the_permalink( $post->ID ) ).'"><span>'.esc_html__('Read More','razia-blog').'</span></a>'; 
		            ?>
		        </div>
		      <?php 
			} 

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'razia-blog' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<?php if ( is_singular() ) : ?>
			<footer class="entry-footer">
				<?php razia_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>
</article>