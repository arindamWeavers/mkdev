<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package colonialsurety
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="body">
        <div class="wrapper">
            <div class="content">

    <div class="entry-content">
        <?php

        //the_content();

        $terms = get_terms(array(
            'taxonomy' => 'team_category',
            'hide_empty' => true
        ));


        foreach ($terms as $term) {
            if (!is_array($exclude = get_field('exclude')) || !in_array($term->term_id, $exclude)){
                ?>
                <section class="team-list widget">
                    <?php
                    //var_dump($widget);
                    if ($term->name){
                        ?>
                        <h2 class="title"><span><?php echo $term->name ?></span></h2>
                    <?php
                    }
                    ?>

                    <div class="columns listing">
                        <?php
                        $posts = get_posts(
                            array(
                                'post_type'      => 'team',
                                'posts_per_page' => -1,
                                'tax_query'      => array(array('taxonomy'=>'team_category', 'terms'=>$term->term_id)),
                                'orderby'        => 'menu_order',
                                'order'          => 'ASC',
                            )
                        );

                        foreach ($posts as $item) {
                            $img = wp_get_attachment_image_src(get_post_thumbnail_id($item->ID), 'team-thumbnail');

                            ?><div class="column team">
                            <div class="image" style="background-image: url(<?php echo $img[0] ?: get_template_directory_uri() . '/images/team/placeholder.png'; ?>)"></div>
                            <h3>
								<?php /*<a href="<?php echo esc_attr(get_permalink($item));?>"><?php echo $item->post_title;?></a>*/ ?>
								<?php echo $item->post_title;?>
							</h3>
                            <div class="position"><?php echo get_field('position', $item);?></div>
                            <div class="email"><a href="mailto:<?php echo get_field('email', $item);?>"><?php echo get_field('email', $item);?></a></div>
                            <div class="telephone"><a href="tel:<?php echo get_field('telephone', $item);?>"><?php echo get_field('telephone', $item);?></a></div>
                            </div><?php
                        }
                        ?>
                    </div>

                    <?php
                    if (!empty($widget['button']['title'])) {
                        ?>
                        <a class="button red" href="<?php echo $widget['button']['link']?>"<?php if ($widget['button']['open_in_new_window']) echo ' target="_blank"';?>><?php echo $widget['button']['title']?></a>
                    <?php
                    }
                    ?>
                </section>
            <?php
            }
        }

        /*
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'colonialsurety' ),
            'after'  => '</div>',
        ) );
        */
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php
        edit_post_link(
            sprintf(
            /* translators: %s: Name of current post */
                esc_html__( 'Edit %s', 'colonialsurety' ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ),
            '<span class="edit-link">',
            '</span>'
        );
        ?>
    </footer><!-- .entry-footer -->
            </div>
        </div>
    </div>
</article><!-- #post-## -->
