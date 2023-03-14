<?php $menu = get_site_navigation(); ?>
<nav id="site-navigation" class="main-header__nav" role="navigation" aria-label="Main navigation">
  <ul class="main-header__nav-list" role="menubar">
    <?php foreach($menu as $index => $item): ?>
      <li class="main-header__nav-item" aria-haspopup="true" role="menuitem">
        <button class="main-header__nav-btn" aria-expanded="false" <?php echo $index!==0 ? 'tabindex="-1"' : ''?>><?php echo $item->post_title; ?></button>
        <div class="main-header__nav-item-content">
          <div class="main-header__nav-item-content-wrapper wrapper">
            <?php if($item->children): ?>
            <?php foreach($item->children as $childItem): ?>
              <?php $menuWidgetID = $childItem->object_id; ?>
              <?php $widget = basename(get_post_meta( $menuWidgetID, '_wp_page_template', true ),'.php');  ?>
              <?php if($widget === 'sublist-menu-item'): ?>
                <?php 
                  $listClasses = [];
                  if(get_field('horizontal_sublist',$menuWidgetID)) {
                    $listClasses[] = 'main-header__nav-sublist--centered';
                  }
                  if(get_field('cozy_sublist',$menuWidgetID)) {
                    $listClasses[] = 'main-header__nav-sublist--cozy';
                  }
                ?>
                <ul class="main-header__nav-sublist <?php echo implode(' ',$listClasses); ?>" role="menu" aria-label="<?php echo wp_strip_all_tags($childItem->title); ?>">
                  <?php $sublist = get_field('sublist',$menuWidgetID); ?>
                  <?php foreach($sublist as $listItem): ?>
                    <?php $icon = !empty($listItem['sublist_item_icon']) ? $listItem['sublist_item_icon'] : false; ?>
                    <li class="main-header__nav-subitem <?php echo $icon ? 'main-header__nav-subitem--with-icon' : ''; ?>" role="menuitem">
                      <?php if(!empty($listItem['sublist_item_url'])): ?><a href="<?php echo $listItem['sublist_item_url']; ?>"><?php endif; ?>
                      <?php if(!empty($listItem['is_bold'])): ?><strong><?php endif; ?>
                        <?php if(!empty($listItem['sublist_item_icon'])): ?>
                          <img src="<?php echo $listItem['sublist_item_icon']; ?>" class="main-header__nav-item-icon" />
                        <?php endif; ?>
                        <?php echo $listItem['sublist_item_label']; ?>
                      <?php if(!empty($listItem['is_bold'])): ?></strong><?php endif; ?>
                      <?php if(!empty($listItem['sublist_item_url'])): ?></a><?php endif; ?>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php elseif( $widget === 'product-selection-menu-item') : ?>
                <?php
                  $products = get_product_listing(false,$menuWidgetID);
                  $productListingID = $menuWidgetID;
                  include('includes/product-listing.php');
                ?>
              <?php elseif( $widget === 'articles-menu-item') : ?>
                  <div class="main-header__nav-articles" role="menu" aria-label="<?php echo $childItem->title; ?>">
                    <?php $articles = get_field('menu_articles',$menuWidgetID); ?>
                    <?php foreach($articles as $article): $article = $article['menu_article']; ?>
                      <a href="<?php echo get_permalink($article->ID); ?>" class="main-header__nav-article" aria-labelledby="resource-article-<?php echo $article->ID; ?>" role="menuitem">
                        <div class="main-header__nav-article-image-wrapper">
                          <div style="background-image: url(<?php echo get_the_post_thumbnail_url($article->ID); ?>" class="main-header__nav-article-image"></div>
                        </div>
                        <div class="main-header__nav-article-content">
                            <div class="main-header__nav-article-header" id="resource-article-<?php echo $article->ID; ?>"><?php echo wp_strip_all_tags(preg_replace('/([\s]*<br[\/]*>[\s]*)+/',' ',$article->post_title)); ?></div>
                            <?php 
                                $term = wp_get_post_categories($article->ID, array('exclude'=>get_category_by_slug('featured')->term_id))[0];
                                $category = $term ? get_category($term) : false;
                                $categoryText = $category ? $category->name : 'View Article'
                            ?>
                            <div class="main-header__nav-article-category"><?php echo $categoryText; ?></div>
                        </div>
                      </a>
                    <?php endforeach; ?>
                  </div>
              <?php endif; ?>
            <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</nav>