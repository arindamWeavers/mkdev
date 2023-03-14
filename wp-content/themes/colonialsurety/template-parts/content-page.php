<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package colonialsurety
 */

$content = get_the_content();
if ( !is_front_page() && !empty( $content ) ){

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="body">
        <div class="wrapper">
            <div class="content">
                <div class="entry-content">


                    <?php
                    global $more;
                    $more = 0;
                    ?>

                    <?php the_content('Continue Reading'); ?>

                    <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'colonialsurety' ),
                        'after'  => '</div>',
                    ) );
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

<?php
}
?>
