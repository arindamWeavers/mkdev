<?php
/**
 * Template Name: Marketing Landing
 *
 * @package colonialsurety
 */

get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main landing-main-content" role="main" class="landing">
    <?php
    if(have_rows('page_content')) {
        while (have_rows('page_content')) {
            the_row();
            get_template_part('template-parts/marketing-landing/flexible-content/' . get_row_layout());
        }
    }
    ?>
    </main>
</div>
<?php get_footer(); ?>
