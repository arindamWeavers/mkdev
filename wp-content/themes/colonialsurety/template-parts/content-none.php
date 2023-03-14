<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package colonialsurety
 */

?>

<section class="no-results not-found">
	<header class="page-header">
        <?php
        if ( is_search() && trim(get_search_query())=='') {
            ?>
            <h1 class="page-title"><?php esc_html_e('Empty Search', 'colonialsurety'); ?></h1>
        <?php
        }else{
            ?>
            <h1 class="page-title"><?php esc_html_e('Nothing Found', 'colonialsurety'); ?></h1>
            <?php
        }
        ?>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'colonialsurety' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) :

            if ( trim(get_search_query())!=='' ){
                $msg = esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'colonialsurety' );
            }else{
                $msg = esc_html_e( 'Sorry, but you cannot enter an empty search. Please try again with some keywords.', 'colonialsurety' );
            }
            ?>
			<p><?php echo $msg; ?></p>
			<?php

		else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'colonialsurety' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
