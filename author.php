<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage Nori
 * @since Nori 1.0
 */

get_header(); ?>

	<div id="content" class="clearfix">

		<?php the_post(); ?>
		<header class="page-header">
			<h1 class="page-title author"><?php	printf( __( 'Author Archives: <span class="vcard">%s</span>', 'nori' ), get_the_author() ); ?></h1>
		</header><!-- end .page-header -->
				
		<?php rewind_posts(); ?>
			
		<div id="posts-container" class="clearfix">
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
		</div><!-- end #posts-container -->
				
			<?php /* Display navigation to next/previous pages when applicable, also check if WP pagenavi plugin is activated */ ?>
			<?php if(function_exists('wp_pagenavi')) : wp_pagenavi(); else: ?>
				
				<?php if (  $wp_query->max_num_pages > 1 ) : ?>
					<nav id="nav-below">
						<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'nori' ) ); ?></div>
						<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'nori' ) ); ?></div>
					</nav><!-- end #nav-below -->
				<?php endif; ?>

			<?php endif; ?>
				
			<div class="clear"></div>
			<?php if ( is_active_sidebar( 'widget-area-main' ) ) : ?>
				<div class="widget-area">
					<?php dynamic_sidebar( 'widget-area-main' ); ?>
				</div><!-- .widget-area -->
			<?php endif; ?>

	</div><!-- end #content -->

<?php get_footer(); ?>