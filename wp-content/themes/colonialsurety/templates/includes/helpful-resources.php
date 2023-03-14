<?php if(get_field('include_helpful_resources')): ?>
  <?php $resources = get_field('resource_articles'); ?>
  <?php if(!empty($resources) && is_array($resources)): ?>
  <div class="helpful-resources">
    <div class="wrapper">
      <h2 class="helpful-resources__header"><?php echo is_single() ? 'You May Also Like' : 'Helpful Resources'; ?></h2>
      <div class="helpful-resources__articles">
        <?php foreach($resources as $resource): $article = $resource['resource_article']; ?>
        <a href="<?php echo get_permalink($article->ID); ?>" class="helpful-resources__article" aria-labelledby="resource-article-<?php echo $article->ID; ?>">
          <div class="helpful-resources__article-image-wrapper">
            <?php 
              $imageUrl = !empty($resource['resource_override_image']) 
                ? $resource['resource_override_image'] 
                : get_the_post_thumbnail_url($article->ID); 
              ?>
            <div class="helpful-resources__article-image" style="background-image: url(<?php echo $imageUrl; ?>"></div>
          </div>
          <div class="helpful-resources__article-header" id="resource-article-<?php echo $article->ID; ?>">
            <?php echo wp_strip_all_tags(preg_replace('/([\s]*<br[\/]*>[\s]*)+/',' ',$article->post_title)); ?>
          </div>
          <?php 
              $term = wp_get_post_categories($article->ID, array('exclude'=>get_category_by_slug('featured')->term_id))[0];
              $category = $term ? get_category($term) : false;
              $categoryText = $category ? $category->name : 'View Article'
          ?>
          <div class="helpful-resources__article-category"><?php echo $categoryText; ?></div>
        </a>
        <?php endforeach; ?>
        <?php if(sizeof($resources) < 3): ?>
        <a href="/blog/" class="helpful-resources__article helpful-resources__article--empty">
          <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" class="helpful-resources__see-all-arrow">
              <g fill="none" fill-rule="evenodd">
                  <circle cx="30" cy="30" r="29" stroke="#94A5AF" stroke-width="2"/>
                  <path fill="#94A5AF" d="M33.335 22.24c-.34-.32-.908-.32-1.26 0a.758.758 0 0 0 0 1.136l6.388 5.815H17.382c-.491 0-.882.356-.882.803 0 .448.39.815.882.815h21.081l-6.388 5.804a.771.771 0 0 0 0 1.146c.352.321.92.321 1.26 0l7.9-7.191a.742.742 0 0 0 0-1.135l-7.9-7.192z"/>
              </g>
          </svg>
          <span class="helpful-resources__empty-article-text">See all blog articles</span>
        </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
<?php endif; ?>