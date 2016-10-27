<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Back to Front Starter
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header>		

			<?php while ( have_posts() ) : the_post(); 
				
				/*
				* Include the Post-Format-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Format name) and that will be used instead.
				*/
				
				get_template_part( 'components/post/content', get_post_format() );

			endwhile; 

			the_posts_navigation( array(
				'prev_text' => __( '&lt; Previous', 'back_to_front_starter' ),
				'next_text' => __( 'Next &gt;', 'back_to_front_starter' ),
			) ); 
		
		 else :

			get_template_part( 'partials/content', 'none' );

			endif; ?>

		</main>
	</div>

<?php

get_sidebar();
get_footer();