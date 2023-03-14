<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package colonialsurety
 */

?>

    </main><!-- #content -->


</div><!-- #page -->

<?php if(is_page_template('templates/marketing-landing.php')) : ?>
    <?php get_template_part('template-parts/marketing-landing/footer'); ?>
<?php else : ?>
<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="contact-us">
        <div class="wrapper">
            <div><button class="toggle"><span>Contact Us</span></button></div>
        </div>
        <div class="content">
            <div class="call">
                <div class="container">
                    <?php echo get_field('call_us_text', 'option') ?>
                    <?php $globalPhoneNum = get_field('global_phone_number') ?: get_field('telephone', 'option'); ?>
                    <a class="tel" href="tel:<?php echo preg_replace('/[\.\-]/','',$globalPhoneNum); ?>"><?php echo $globalPhoneNum ?></a>
                </div>
            </div><div class="latest-updates">
                <div class="container">
                    <?php echo get_field('latest_updates_text', 'option') ?>
                    <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 9, 'title' => false, 'description' => false ) ); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <nav  class="footer-navigation" role="navigation" aria-label="Footer navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'depth' => 1 ) ); ?>
        </nav>
        <nav class="social-navigation" role="navigation" aria-label="Social navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'social', 'menu_id' => 'social-menu' ) ); ?>
        </nav>
        <div class="site-info">
            <!--a href="<?php echo esc_url( __( 'https://wordpress.org/', 'colonialsurety' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'colonialsurety' ), 'WordPress' ); ?></a-->
            <span><?php echo get_field('copyright', 'options')?></span>
            <span class="sep"> | </span>
            <span><?php echo get_field('address', 'options')?></span>
            <span class="sep"> | </span>
            <a href="mailto:<?php echo get_field('email', 'options')?>"><?php echo get_field('email', 'options')?></a>
        </div><!-- .site-info -->
    </div>
</footer><!-- #colophon -->
<?php endif; ?>
<?php wp_footer(); ?>

<?php echo get_field('miscellaneous_footer_scripts', 'options', false); ?>
</body>
</html>
