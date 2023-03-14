<?php
get_header(); ?>
<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <div class="marquee">
      <div class="marquee__content">
        <div class="wrapper">
          <h1 class="marquee__header">Our Blog - Surety Matters</h1>
          <div class="marquee__copy">
            Our blog covering the latest in bonds and insurance
            <?php include(get_template_directory() . '/templates/searchform/blog.php'); ?>
          </div>
        </div>
      </div>
    </div>
    <?php $currentCategory = is_category() ? get_queried_object() : ''; ?>
    <?php $cats = get_categories(); ?>
    <div class="blog-categories">
      <button class="blog-categories__button" aria-expanded="false" id="blog-categories">
        <span class="wrapper blog-categories__button-text">
          <?php if(is_category()): ?>
            <span class="sr-only">Categories</span>
            <span class="sr-only">Currently selected category:</span><?php echo $currentCategory->name; ?>
          <?php else: ?>
            Categories
          <?php endif; ?>
        </span>
      </button>
      <div class="wrapper">
        <ul class="blog-categories__list" aria-labelledby="blog-categories">
          <li class="blog-categories__category">
            <a href="/blog/" class="blog-categories__link<?php echo is_home() ? ' blog-categories__link--active' : '' ?>"><?php echo is_home() ? '<span class="sr-only">Currently selected category:</span>' : '' ?>All</a>
          </li>
          <?php foreach($cats as $cat) : ?>
          <li class="blog-categories__category">
            <a href="<?php echo esc_attr(get_term_link($cat))?>" class="blog-categories__link<?php echo $cat->term_id === $currentCategory->term_id ? ' blog-categories__link--active' : '' ?>">
              <?php echo $cat->term_id === $currentCategory->term_id ? '<span class="sr-only">Currently selected category:</span>' : '' ?><?php echo $cat->name; ?>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <?php if ( have_posts() ) : ?>
      <article class="article">
        <div class="article__wrapper wrapper">
          <div class="article__main">
            <?php if ( have_posts() ) : ?>
              <?php if( is_search() || is_tag() ) : ?>
              <?php $searchQuery = htmlentities(get_search_query() ?: (is_tag() ? get_queried_object()->name : '' )); ?>
                <div class="search-meta">
                    Displaying <?php echo $wp_query->found_posts; ?> results for: <strong><?php echo $searchQuery; ?></strong>
                </div>
              <?php endif; ?>
              <?php while ( have_posts() ) : the_post(); ?>
                <div class="post-preview">
                  <div class="post-preview__content">
                    <div class="post-preview__meta">
                      <?php $category = get_primary_category(); ?>
                      <?php if($category) : ?>
                        <a rel="category" href="<?php echo esc_attr(get_term_link($category))?>" class="post-preview__category">
                          <?php echo $category->name?>
                        </a>
                      <?php endif; ?>
                      <span class="post-preview__date"><?php the_time('m.d.Y'); ?></span>
                    </div>
                    <h2 class="post-preview__heading">
                      <a href="<?php echo get_the_permalink(); ?>" class="post-preview__heading-link"><?php the_title(); ?></a>
                    </h2>
                    <div class="post-preview__excerpt"><?php the_excerpt(); ?></div>
                  </div>
                  <?php $postImage = get_the_post_thumbnail_url($article->ID); ?>
                  <a href="<?php echo get_the_permalink(); ?>" class="post-preview__image" style="background-image: url(<?php echo $postImage; ?>);"><span class="sr-only"><?php the_title(); ?></span></a>
                </div>
              <?php endwhile; wp_reset_query(); ?>
              <nav class="pagination" aria-label="<?php echo (is_search() || is_tag()) ? 'Search Results' : (is_category() ? $currentCategory->name : 'Blog'); ?> Pagination">
                <?php echo paginate_links(['prev_text'=>'Previous','next_text'=>'Next']); wp_reset_query();?>
              </nav>
            <?php endif; ?>
          </div>
          <div class="article__rail rail">
            <div class="rail__inner">
              <?php $popularArticles = get_field('popular_articles',get_option( 'page_for_posts' )); ?>
              <?php if($popularArticles): ?>
              <div class="popular-articles">
                <h2 class="popular-articles__heading" id="popular-articles">Popular Articles</h2>
                <ul class="popular-articles__list" aria-labelledby="popular-articles">
                  <?php foreach($popularArticles as $popularArticle): $popularArticle = $popularArticle['popular_article']; ?>
                  <li class="popular-articles__article">
                    <a href="<?php echo get_the_permalink($popularArticle->ID); ?>" class="popular-articles__link">
                      <?php echo $popularArticle->post_title; ?>
                    </a>
                    <?php $articleImage = get_the_post_thumbnail_url($popularArticle->ID,'thumbnail'); ?>
                    <div class="popular-articles__image" style="background-image: url(<?php echo $articleImage; ?>);"></div>
                  </li>
                  <?php endforeach; ?>
                </ul>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </article>
    <?php else: ?>
      <div class="no-results">
        <div class="wrapper">
          <h2 class="no-results__heading">We&rsquo;re sorry!</h2>
          <p class="no-results__copy">Your search term did not bring any results. Please try another search term.</p>
          <ul class="no-results__list">
            <li class="no-results__item">
              <a href="/category/erisa/" class="no-results__link">ERISA Bonds</a>
            </li>
            <li class="no-results__item">
              <a href="/category/court-bonds/" class="no-results__link">Court &amp; Fiduciary Bonds</a>
            </li>
            <li class="no-results__item">
              <a href="/category/license-permit-bonds/" class="no-results__link">License &amp; Permit Bonds</a>
            </li>
            <li class="no-results__item">
              <a href="/insurance/cyber-liability-insurance/" class="no-results__link">Cyber Liability Insurance</a>
            </li>
          </ul>
        </div>
      </div>
    <?php endif; ?>
  </main>
</div>
<?php get_footer(); ?>