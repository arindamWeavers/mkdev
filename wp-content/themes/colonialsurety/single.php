<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

            <div class="body">
                <div class="wrapper">
                    <div class="content">
            <?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', get_post_format() );

                //the_post_navigation();

                // If comments are open or we have at least one comment, load up the comment template.
                /*
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                */

            endwhile; // End of the loop.
            ?>
                    </div>
                </div>
            </div>

            <?php

            $widgets_field = 'widgets_bottom';

            get_template_part( 'template-parts/content', 'widgets' );

            ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
