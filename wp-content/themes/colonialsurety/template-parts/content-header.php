<?php
/**
 * Template part for displaying page content header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package colonialsurety
 */

?>


<?php
$header_bg = '';
if (!is_front_page()) {
    if (empty(get_field('hide_banner'))) {
	    if ( isBlog() ) :
		    $header_bg = get_the_post_thumbnail_url( get_post( get_option( 'page_for_posts' ) ) );
        elseif ( is_search() ) :
		    $header_bg = false;
        elseif ( get_field( 'banner_image' ) ) :
		    $header_bg = get_field( 'banner_image' );
	    else :
		    $header_bg = get_the_post_thumbnail_url( '' );
	    endif;

	    if ( ! $header_bg ) {
		    $header_bg = get_field( 'default_header_background', 'options' )['url'];
	    }
    }
?>
<header class="<?php echo (empty($header_bg))? 'without-banner ' : ''; ?>entry-header overlay"<?php echo (empty($header_bg))? '' : ' style="background-image: url('.$header_bg.')"'; ?>>
    <div class="wrapper">
        <?php if ( is_search() ): ?>
            <h1 class="entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'colonialsurety' ), '<span class="search-text">' . get_search_query() . '</span>' ); ?></h1>
        <?php elseif ( is_404() ): ?>
            <h1 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'colonialsurety' ); ?></h1>
        <?php elseif ( isBlog() ): ?>
            <h1 class="entry-title"><?php echo get_post(get_option('page_for_posts'))->post_title; ?></h1>
        <?php elseif ( isJobs() ): ?>
            <?php // nothing to do; ?>
        <?php else: ?>
            <h1 class="entry-title"><?php echo get_the_title(); ?></h1>
        <?php endif;?>
    </div>
</header><!-- .entry-header -->
<?php
}
