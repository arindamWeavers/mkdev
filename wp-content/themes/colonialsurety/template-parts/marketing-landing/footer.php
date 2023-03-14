<?php
 /**
  * Footer Template for Marketing Landing Pages
  */
?>

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="contact-us">
        <div class="wrapper">
            <div><button class="toggle"><span>Contact Us</span></button></div>
        </div>
        <div class="content">
            <div class="call">
                <div class="container">
                    <?php echo get_field('call_us_text', 'option') ?>
                    <a class="tel" href="tel:<?php echo get_field('telephone', 'option') ?>"><?php echo get_field('telephone', 'option') ?></a>
                </div>
            </div><div class="latest-updates">
                <div class="container">
                    <?php echo get_field('latest_updates_text', 'option') ?>
                    <?php echo do_shortcode('[mc4wp_form id="249"]') ?>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <div class="site-info">
            <span><?php echo get_field('copyright', 'options')?></span>
            <span class="sep"> | </span>
            <span><?php echo get_field('address', 'options')?></span>
            <span class="sep"> | </span>
            <a href="mailto:<?php echo get_field('email', 'options')?>"><?php echo get_field('email', 'options')?></a>
        </div>
    </div>
</footer>
<?php echo get_field('miscellaneous_footer_scripts', 'options', false); ?>