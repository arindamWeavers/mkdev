<?php
/**
 * Template Name: Content Page
 *
 * @package colonialsurety
 */
get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php if(!get_field('hide_marquee')): ?>
        <?php
            $marqueeStyle = get_field('marquee_style');
            $marqueeImage = get_field('marquee_background');
            $marqueeIcon = get_field('marquee_icon');
            $marqueeHeading = get_field('marquee_header') ?: get_the_title();
            $marqueeSubtext = get_field('marquee_subtext');
        ?>
        <div class="marquee<?php echo $marqueeStyle ? " marquee--$marqueeStyle" : ''; ?>">
          <?php if($marqueeImage): ?>
          <div class="marquee__bg" style="background-image: url(<?php echo $marqueeImage; ?>);"></div>
          <?php endif; ?>
          <div class="marquee__content <?php if($marqueeIcon): ?>marquee__content--with-icon<?php endif; ?>">
            <div class="wrapper">
              <?php if($marqueeIcon): ?><img src="<?php echo $marqueeIcon; ?>" class="marquee__icon" /><?php endif; ?>
              <h1 class="marquee__header"><?php echo $marqueeHeading; ?></h1>
              <?php if($marqueeSubtext): ?><div class="marquee__copy"><?php echo $marqueeSubtext; ?></div><?php endif; ?>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <article class="article article--full-width">
          <div class="article__main">
            <?php $content = get_the_content(); ?>
            <?php if($content) : ?>
            <div class="article__content">
              <div class="wrapper wrapper--content">
                <div class="editor-content">
                  <div class="editor-content__content">
                    <?php echo apply_filters('the_content',$content); ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <?php $includeWidgetWrapper = true ?>
            <?php include('includes/content-widgets.php'); ?>
          </div>
          <div class="article__rail">
            <div class="wrapper">
              <?php include('includes/cta.php'); ?>
            </div>
          </div>
        </article>
        <?php include('includes/helpful-resources.php'); ?>
        <?php include('includes/colonial-trust.php'); ?>
        <?php include('includes/colonial-proud.php'); ?>
    </main>
</div>
<?php get_footer(); ?>