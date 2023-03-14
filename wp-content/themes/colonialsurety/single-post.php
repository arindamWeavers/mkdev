<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package colonialsurety
 */

get_header(); ?>
<?php $category = get_primary_category(); ?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <div class="wrapper">
        <nav class="post-breadcrumbs" aria-label="Breadcrumb">
          <ul class="post-breadcrumbs__list">
            <li class="post-breadcrumbs__breadcrumb"><a href="/" class="post-breadcrumbs__link">Home</a></li>
            <li class="post-breadcrumbs__breadcrumb"><a href="/blog" class="post-breadcrumbs__link">Surety Matters</a></li>
            <?php if($category) : ?>
            <li class="post-breadcrumbs__breadcrumb">
              <a href="<?php echo esc_attr(get_term_link($category))?>" class="post-breadcrumbs__link"><?php echo $category->name; ?></a>
            </li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>
      <div class="wrapper">
        <div class="post-header">
          <?php if($category): ?>
            <a href="<?php echo esc_attr(get_term_link($category))?>" class="post-header__category">
              <?php echo $category->name; ?>
            </a>
          <?php endif; ?>
          <h1 class="post-header__title"><?php the_title(); ?></h1>
          <span class="post-header__date"><?php the_time('m.d.Y'); ?></span>
        </div>
      </div>
      <article class="article">
        <div class="article__wrapper wrapper">
          <?php include('templates/partials/social-share.php'); ?>
          <div class="article__main">
            <?php $postImage = get_the_post_thumbnail_url(get_the_id()); ?>
            <div class="article__featured-image" style="background-image: url(<?php echo $postImage; ?>);"></div>
            <?php the_content(); ?>
            <p>
              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="19" viewBox="0 0 13 19">
                  <g fill="none" fill-rule="evenodd">
                      <path fill="#CD2026" d="M7.75 3.6v3.99A4.296 4.296 0 0 1 9.5 11.067c0 2.348-1.851 4.259-4.127 4.259-.046 0-.092-.003-.138-.004v3.603l.138.002c4.2 0 7.617-3.527 7.617-7.86 0-3.477-2.2-6.432-5.238-7.466"/>
                      <path fill="#0B2837" d="M7.617 0C3.417 0 0 3.526 0 7.86c0 3.478 2.2 6.433 5.238 7.467v-3.989A4.299 4.299 0 0 1 3.49 7.86c0-2.349 1.85-4.26 4.127-4.26.046 0 .092.003.138.004V.002L7.617 0"/>
                  </g>
              </svg>
            </p>
          </div>
          <div class="article__rail rail">
            <div class="rail__inner">
              <?php include('templates/partials/social-share.php'); ?>
              <?php $articleProducts = get_field('article_products'); ?>
              <?php if($articleProducts): ?>
              <div class="article-products">
                <h2 class="article-products__heading" id="article-products">Products in this Article</h2>
                <ul class="article-products__list" aria-labelledby="article-products">
                  <?php foreach($articleProducts as $articleProduct): ?>
                  <li class="article-products__item">
                    <a href="<?php echo $articleProduct['article_product_url']; ?>" class="article-products__link">
                      <?php echo $articleProduct['article_product_text']; ?>
                    </a>
                  </li>
                  <?php endforeach; ?>
                </ul>
              </div>
              <?php endif; ?>
              <?php $tags = get_the_tags(); ?>
              <?php if($tags): ?>
              <div class="related-tags">
                <h2 class="related-tags__heading" id="related-tags">Related Tags</h2>
                <ul class="related-tags__list" aria-labelledby="related-tags">
                  <?php foreach($tags as $tag): ?>
                  <li class="related-tags__item">
                    <a href="<?php echo esc_attr(get_tag_link($tag))?>" class="related-tags__link">
                      <?php echo $tag->name; ?>
                    </a>
                  </li>
                  <?php endforeach; ?>
                </ul>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </article>
      <?php include('templates/includes/helpful-resources.php'); ?>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
