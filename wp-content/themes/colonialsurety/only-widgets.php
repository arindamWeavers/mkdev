<?php

/**
 * Template Name: Only Widgets
 *
 * @package colonialsurety
 */


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

            <?php
            get_template_part( 'template-parts/content', 'header' );

            get_template_part( 'template-parts/content', 'widgets' );
            ?>

			<?php
            /*
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.

			endwhile; // End of the loop.
            */
            ?>

            <?php

            wp_reset_postdata();

            $widgets_field = 'widgets_bottom';

            get_template_part( 'template-parts/content', 'widgets' );

			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
