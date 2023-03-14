<?php
/**
 * Template Name: Simple Layout Page
 *
 * @package colonialsurety
 */
get_header() ?>
<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
        <div class="marquee">
            <div class="marquee__content">
                <div class="wrapper">
                <h1 class="marquee__header"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
        <div class="article__wrapper wrapper">
            <?php $isSideContent = get_field('single_block');?>
            <div class="article__main <?php echo $isSideContent ? '' : ' fullWidth'?> ">
                <div class="article__content">
                    <?php the_content()?>
                </div>
            </div>
                <?php if($isSideContent):?>
                <div class="article__rail rail">
                <div class="rail__inner">
                <?php while ( have_rows('single_block') ) : the_row();
                            include(get_template_directory() . '/template-parts/asideBlock.php');
                        endwhile;
                    endif;?>
                </div>
            </div>
        </div> 
        <?php if(have_rows('widgets_bottom')):
                while(have_rows('widgets_bottom')) : the_row();
                    $layOutName = get_row_layout();
                    if($layOutName === 'trust_pilot'): 
                        include(get_template_directory() . '/templates/includes/colonial-trust.php');
                    else:
                        include(get_template_directory() . '/templates/includes/'.$layOutName.'.php');
                    endif;
                endwhile;
             endif;?>
    </main>
</div>
<?php get_footer(); ?>