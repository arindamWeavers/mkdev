<?php

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

            <?php
            get_template_part( 'template-parts/content', 'header' );

            ?>
            <div class="upper-widgets">
            <?php
            get_template_part( 'template-parts/content', 'widgets' );
            ?>
            </div>

            <div class="widget template-title products">
                <div class="wrapper">
                    <div class="content">
                        <?php
                        the_title( '<h2 class="title"><span>', '</span></h2>' );
                        ?>
                    </div>
                </div>
            </div>

            <div class="body">
                <div class="wrapper">
                    <div class="content">
            <?php

            $my_query = new WP_Query(array('post_type'=>'product', 'posts_per_page'=>-1, 'tax_query'=>array(
                array('taxonomy'=>'product_category', 'terms'=>get_field('categories'))
            )));

			while ( $my_query->have_posts() ) : $my_query->the_post();

				get_template_part( 'template-parts/content', 'product' );

				// If comments are open or we have at least one comment, load up the comment template.
                /*
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
                */

			endwhile; // End of the loop.
			?>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <?php

            wp_reset_postdata();

            global $widgets_field;
            $widgets_field = 'widgets_bottom';

            get_template_part( 'template-parts/content', 'widgets' );

            ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
