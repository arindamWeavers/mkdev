<?php get_header(); ?>
<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <div class="wrapper">
      <div class="search-results__header">
        <h1 class="search-results__heading"><?php echo $wp_query->found_posts ?: 'No'; ?> results for: <strong><?php echo htmlentities(get_search_query()); ?></strong></h1>
        <?php get_search_form(); ?>
      </div>
    </div>
    <?php if ( have_posts() ) : ?>
      <div class="search-results__results">
        <div class="wrapper search-results__results-wrapper">
          <?php while ( have_posts() ) : the_post(); global $post; ?>
            <div class="search-results__result search-result">
              <?php 
                $postType = get_post_type();
                $result = [
                  'link' => get_the_permalink(),
                  'excerpt' =>  get_the_excerpt(),
                  'category' => false
                ];
                if($postType === 'post') {
                  $result['category'] = [
                    'link' => '/blog/',
                    'text' => 'Articles'
                  ];
                } else if($postType === 'page') {
                  $parentPage = get_field('parent_page');
                  if($parentPage) {
                    $result['category'] = [
                      'link' => get_post_permalink($parentPage->ID),
                      'text' => $parentPage->post_title
                    ];
                  }
                } else if($postType === 'product') {
                  $result['link'] = get_field('product_link');
                  $result['excerpt'] = !empty($result['excerpt']) ? $result['excerpt'] : 'Bond Quote Calculator...';
                } else if($postType === 'career') {
                  $result['category'] = [
                    'link' => '/about/careers/',
                    'text' => 'Careers'
                  ];
                } else if($postType === 'team') {
                  $result['link'] = '/about/our-team/';
                }
              ?>
              <h2 class="search-result__heading">
                <a href="<?php echo $result['link'] ?>" class="search-result__link"><?php relevanssi_the_title(); ?></a>
              </h2>
              <?php if(! empty($result['excerpt'])): ?>
                <div class="search-result__excerpt"><?php echo $result['excerpt'] ?></div>
              <?php endif; ?>
              <?php if($result['category']): ?>
                <a href="<?php echo $result['category']['link']; ?>" class="search-result__filing-link">
                  <?php echo $result['category']['text']; ?>
                </a>
              <?php endif; ?>
            </div>
          <?php endwhile; wp_reset_query(); ?>
          <nav class="pagination" aria-label="<?php echo (is_search() || is_tag()) ? 'Search Results' : (is_category() ? $currentCategory->name : 'Blog'); ?> Pagination">
            <?php echo paginate_links(['prev_text'=>'Previous','next_text'=>'Next']); wp_reset_query();?>
          </nav>
        </div>
      </div>
      <?php else: ?>
      <div class="search-results__no-results">
        <div class="wrapper">
          <h2 class="search-results__no-results-heading">We&rsquo;re sorry!</h2>
          <p class="search-results__no-results-copy">Your search term did not bring any results. Please try another search term.</p>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </main>
</div>
<?php get_footer(); ?>