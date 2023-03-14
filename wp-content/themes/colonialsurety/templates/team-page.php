<?php
/**
 * Template Name: Team Page
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
          <div class="marquee__copy">
            Our team of experts is a phone call away
          </div>
        </div>
      </div>
    </div>
    <div class="wrapper">
      <?php 
        $terms = get_terms(array(
          'taxonomy' => 'team_category',
          'hide_empty' => true
        ));
      ?>
      <?php if($terms) : ?>
        <?php foreach($terms as $term): ?>
          <?php if (is_array($exclude = get_field('exclude')) && in_array($term->term_id, $exclude)){ continue; } ?>
          <div class="team">
            <div class="team__rail">
              <h2 class="team__name" id="team-erisa"><?php echo $term->name; ?></h2>
            </div>
            <?php
              $teamMembers = get_posts(
                array(
                  'post_type'      => 'team',
                  'posts_per_page' => -1,
                  'tax_query'      => array(array('taxonomy'=>'team_category', 'terms'=>$term->term_id)),
                  'orderby'        => 'menu_order',
                  'order'          => 'ASC',
                )
              );
            ?>
            <ul class="team__members" aria-labelledby="team-erisa">
              <?php foreach($teamMembers as $teamMember): ?>
                <?php
                  $position = get_field('position',$teamMember->ID); 
                  $phone    = get_field('telephone',$teamMember->ID);
                  $email    = get_field('email',$teamMember->ID);
                ?>
                <li class="team__member">
                  <div class="reptile">
                    <div class="reptile__content">
                      <div class="reptile__image"><?php echo get_the_post_thumbnail($teamMember->ID,'thumbnail') ?></div>
                      <div class="reptile__info">
                        <div class="reptile__subheading"><?php echo $teamMember->post_title; ?></div>
                        <p><?php echo $position; ?></p>
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
                      </div>
                    </div>
                  </div>
                </li>
              <?php endforeach; ?>
              <li class="team__member team__member--empty"></li>
            </ul>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    <?php include(get_template_directory() . '/templates/includes/colonial-proud.php'); ?>
  </main>
</div>
<?php get_footer();