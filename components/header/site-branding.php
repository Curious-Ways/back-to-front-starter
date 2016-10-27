		<div class="site-branding">

			<?php

			// Custom logo
			// ----------------------
			if ( has_custom_logo() ) {
				back_to_front_starter_the_custom_logo();

			// Site title
			// ----------------------

			} else { ?>

				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

			<?php }		

			// Site description
			// ----------------------

			$description = get_bloginfo( 'description', 'display' );

			if ( $description || is_customize_preview() ) : ?>
			
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			
			<?php
			endif; ?>
		
		</div><!-- .site-branding -->