<?php
/**
 * Template Name: Our Story Page
 *
 * @package colonialsurety
 */
get_header() ?>
<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <?php
        $marqueeImage = get_field('marquee_background');
        $marqueeIcon = get_field('marquee_icon');
        $marqueeHeading = get_field('marquee_header') ?: get_the_title();
        $marqueeSubtext = get_field('marquee_subtext');
    ?>
    <div class="marquee">
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
    <article class="article">
      <div class="wrapper">
        <div class="story">
          <div class="story__content">
            <?php the_content(); ?>
          </div>
          <img src="/wp-content/themes/colonialsurety/images/Woodcliff-SVG.svg" alt="" width="360" height="274">
        </div>
        <div class="timeline" data-slider-container data-title="Colonial Surety Timeline">
          <h2 class="timeline__heading">Colonial's important historic events.</h2>
          <div class="slider">
            <div class="timeline__slide">
              <h3 class="timeline__date">1930</h3>
              <div class="timeline__copy">Incorporated as a property and casualty insurance company in Pennsylvania</div>
            </div>
            <div class="timeline__slide">
              <h3 class="timeline__date">1986</h3>
              <div class="timeline__copy">Purchased by C.S.I. Holding Corporation, the company’s current management</div>
            </div>
            <div class="timeline__slide">
              <h3 class="timeline__date">1988</h3>
              <div class="timeline__copy">Became a direct writer of surety and fidelity bonds</div>
            </div>
            <div class="timeline__slide">
              <h3 class="timeline__date">1992</h3>
              <div class="timeline__copy">Listed with the United States Treasury</div>
            </div>
            <div class="timeline__slide">
              <h3 class="timeline__date">1992</h3>
              <div class="timeline__copy">Became an approved Federal Surety Company authorized by the U.S. Treasury Dept. to issue other insurance products</div>
            </div>
            <div class="timeline__slide">
              <h3 class="timeline__date">2001</h3>
              <div class="timeline__copy">Introduced our digital bond purchase process</div>
            </div>
            <div class="timeline__slide">
              <h3 class="timeline__date">2009</h3>
              <div class="timeline__copy">Completed licensing in all 50 states and US Territories</div>
            </div>
            <div class="timeline__slide">
              <h3 class="timeline__date">2015</h3>
              <div class="timeline__copy">Expanded our office.</div>
            </div>
            <div class="timeline__slide">
              <h3 class="timeline__date">2016</h3>
              <div class="timeline__copy">Moved through the ranks form A- to A Excellent rating by AM Best Company.</div>
            </div>
            <div class="timeline__slide">
              <h3 class="timeline__date">2017</h3>
              <div class="timeline__copy">Revamped our online presence.</div>
            </div>
            <div class="timeline__slide">
              <h3 class="timeline__date">2019</h3>
              <div class="timeline__copy">Introduced new surety and fidelity bonds online.</div>
            </div>
            <div class="timeline__slide">
              <h3 class="timeline__date">2020</h3>
              <div class="timeline__copy">More insurance offerings to come.</div>
            </div>
          </div>
        </div>
      </div>
      <div class="choose-us">
        <div class="wrapper">
          <h2 class="choose-us__heading">6 reasons to choose us.</h2>
          <ol class="ordered-callout__list ordered-callout__list--plain">
            <li class="ordered-callout__item">
              <div class="ordered-callout__badge">1</div>
              <div class="ordered-callout__item-heading">Quick Digital Process</div>
              <div class="ordered-callout__content">We offer a streamlined purchase process that allows you to instantly purchase bonds and insurance online.</div>
            </li>
            <li class="ordered-callout__item">
              <div class="ordered-callout__badge">2</div>
              <div class="ordered-callout__item-heading">Direct Insurer</div>
              <div class="ordered-callout__content">Get the convenience and cost savings of purchasing coverage straight from the source in all 50 U.S. states and territories.</div>
            </li>
            <li class="ordered-callout__item">
              <div class="ordered-callout__badge">3</div>
              <div class="ordered-callout__item-heading">Innovative Products</div>
              <div class="ordered-callout__content">We’re the only company to offer cost-effective surety bonds and instant insurance products, i-bonds<sup>&reg;</sup> and i-insurance<sup>&reg;</sup>, for you to obtain at the click of a button.</div>
            </li>
            <li class="ordered-callout__item">
              <div class="ordered-callout__badge">4</div>
              <div class="ordered-callout__item-heading">Deep Expertise</div>
              <div class="ordered-callout__content">Our customer service reps and support attorneys have decades of experience in bonding and insurance.  </div>
            </li>
            <li class="ordered-callout__item">
              <div class="ordered-callout__badge">5</div>
              <div class="ordered-callout__item-heading">Trustworthy</div>
              <div class="ordered-callout__content">Established in 1930, we’re rated "A" Excellent by AM Best Company, Treasury listed in all 50 states and U.S. territories, and approved by the Department of Labor, so you can count on compliance.</div>
            </li>
            <li class="ordered-callout__item">
              <div class="ordered-callout__badge">6</div>
              <div class="ordered-callout__item-heading">Partnership Focused</div>
              <div class="ordered-callout__content">We offer powerful client management tools and programs from our business partners. </div>
            </li>
          </ol>
        </div>
      </div>
    </article>
    <?php include(get_template_directory() . '/templates/includes/colonial-trust.php'); ?>
    <?php include(get_template_directory() . '/templates/includes/colonial-proud.php'); ?>
  </main>
</div>
<?php get_footer();