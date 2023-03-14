<?php
get_header(); ?>
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
        <article class="article<?php echo is_article_full_width() ? ' article--full-width' : ''; ?>">
          <div class="article__wrapper wrapper">
            <div class="article__main">
              <div class="article__content">
                <?php $products = get_product_listing() ?>
                <?php include('product-listing.php'); ?>
                 <?php include('cta.php'); ?>
                <?php the_content(); ?>
              </div>
              <?php include('content-widgets.php'); ?>
            </div>
            <div class="article__rail rail">
              <div class="rail__inner">
                <?php include('cta.php'); ?>
                <?php $includeReptile = get_field('reptile_include_rotating_reptile'); ?>
                <?php $teamMembers = $includeReptile ? array_filter(
                      get_field('reptile_team_members'),
                      function ($member) use (&$sessionKey) {
                        return $member['reptile_team_member']->ID;
                      }
                    ) : [];
                ?>
                <?php if($includeReptile && sizeof($teamMembers)): ?>
                <?php
                    session_start();
                    $sessionKey  = 'reptile-post-' . get_the_ID();
                    $teamMember  = ! empty($_SESSION[$sessionKey]) && array_filter(
                                      $teamMembers,
                                      function ($member) use (&$sessionKey) {
                                        return $member['reptile_team_member']->ID == $_SESSION[$sessionKey]->ID;
                                      }
                                    )
                        ? $_SESSION[$sessionKey] 
                        : $teamMembers[array_rand($teamMembers)]['reptile_team_member'];
                    $_SESSION[$sessionKey] = $teamMember;
                    $position              = get_field('position',$teamMember->ID); 
                    $phone                 = get_field('telephone',$teamMember->ID);
                    $email                 = get_field('email',$teamMember->ID);
                ?>
                <aside class="reptile rail__block" role="complementary" aria-labelledby="reptile-header">
                  <div class="reptile__heading" id="reptile-header">Need Assistance?</div>
                  <div class="reptile__content">
                    <div class="reptile__image"><?php echo get_the_post_thumbnail($teamMember->ID,'thumbnail') ?></div>
                    <div class="reptile__info">
                      <div class="reptile__subheading"><?php echo $teamMember->post_title; ?></div>
                      <p><?php echo $position; ?></p>
                    </div>
                  </div>
                  <p>
                    <a href="tel:<?php echo preg_replace('/[^0-9]/', '',$phone); ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" width="11" height="20" viewBox="0 0 11 20" class="reptile__icon">
                          <g fill="none" fill-rule="evenodd" stroke="#94A5AF">
                              <rect width="9.7" height="18.7" x=".65" y=".65" stroke-width="1.3" rx="2"/>
                              <rect width="2" height="2" x="4.5" y="15.5" rx="1"/>
                              <path stroke-linecap="square" d="M4.5 2.5h2"/>
                          </g>
                      </svg>
                      <span class="sr-only">For assistance call us at:</span>
                      <?php echo $phone; ?>
                    </a>
                    <a href="mailto:<?php echo $email; ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="reptile__icon">
                          <g fill="none" fill-rule="evenodd" stroke="#94A5AF" stroke-linecap="round" stroke-width="1.3">
                              <path stroke-linejoin="round" d="M2 2l16 8-16 8 1.733-7.933z"/>
                              <path d="M4 10h6"/>
                          </g>
                      </svg>
                      <span class="sr-only">For assistance email us at:</span>
                      <?php echo $email; ?>
                    </a>
                  </p>
                </aside>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </article>
        <?php include('helpful-resources.php'); ?>
        <?php include('colonial-trust.php'); ?>
        <?php include('colonial-proud.php'); ?>
    </main>
</div>
<?php get_footer(); ?>
