<li class="ordered-callout__item">
  <?php if(isset($atts['badge'])) : ?>
  <div class="ordered-callout__badge"><?php echo $atts['badge']; ?></div>
  <?php endif; ?>
  <div class="ordered-callout__item-heading"><?php echo $atts['heading']; ?></div>
  <div class="ordered-callout__content"><?php echo wpautop(trim($content)); ?></div>
</li>