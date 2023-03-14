<?php if( ! empty($products) ): ?>
<div class="product-selection">
  <div class="product-selection__heading">
    <?php $id = isset($productListingID) ? $productListingID : null; ?>
    <?php $text = get_field('product_listing_heading',$id) ?: "Know the coverage you're <span class=\"nowrap\">looking for?</span>";?>
    <?php echo $text; ?>
  </div>
  <div class="product-selection__dropdown j-select-wrap">
    <select class="j-select" data-placeholder="Select Now" aria-label="<?php echo wp_strip_all_tags($text); ?>">
      <option></option>
      <?php foreach($products as $product): ?>
        <option value="<?php echo $product['link']; ?>"><?php echo $product['title']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
</div>
<?php if(isset($productListingID)) { unset($productListingID); } ?>
<?php endif; ?>