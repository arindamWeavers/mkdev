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
    <?php
    $url = get_the_post_thumbnail_url('');

    if (empty( $url ))
        $url = get_field('filler_image', 'options')['url'];
    ?>
    <div class="image" style="background-image: url(<?php echo $url; ?>)"><a href="<?php echo esc_attr(get_permalink())?>"></a></div>
    <header class="entry-header">
        <?php
        if ( is_page_template('products-grid.php') ){
            $_title = get_the_title();
            echo '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . ( strlen($_title) > 55 ? substr($_title, 0, 55) . '...' : $_title ) . '</a></h2>';

        }else{
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        }
        ?>
    </header><!-- .entry-header -->
    <div class="entry-content">

        <div class="description">
        <?php
        echo get_field('description');//the_content();
        ?>
        <a class="view-more" href="<?php echo esc_url( get_permalink() ) ?>"><span><?php echo __('learn more')?></span></a>
        </div>

        <div style="clear: both"></div>
        <?php
        if ( get_field('link') ){
            ?>
            <a class="button red<?php echo (get_field('video') ? ' fancybox fancybox.iframe' : '') ?>" href="<?php echo get_field('link')?>"<?php if (get_field('open_in_new_window')) echo ' target="_blank"';?>><?php echo ( get_field('title')=='' ? 'apply now' : get_field('title') ) ?></a>
        <?php
        }
        ?>

    </div><!-- .entry-content -->

    <?php
    /*
    <footer class="entry-footer">
        <?php
            edit_post_link(
                sprintf(
                    esc_html__( 'Edit %s', 'colonialsurety' ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ),
                '<span class="edit-link">',
                '</span>'
            );
        ?>
    </footer><!-- .entry-footer -->
    */
    ?>
</article><!-- #post-## -->