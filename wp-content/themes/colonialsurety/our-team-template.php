<?php
/**
 * Template Name: Our Team
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
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'our-team' );

				// If comments are open or we have at least one comment, load up the comment template.
                /*
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
                */

			endwhile; // End of the loop.
            ?>

            <?php

            //wp_reset_postdata();

            $widgets_field = 'widgets_bottom';

            get_template_part( 'template-parts/content', 'widgets' );

			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
