<?php $includeCTA = get_field('rail-cta_include_rail_cta'); ?>
<?php if($includeCTA): ?>
<aside class="cta rail__block" role="complementary" aria-labelledby="cta-header">
  <?php if(get_field('rail-cta_include_heading')): ?>
    <div class="cta__heading" id="cta-header">
        <?php $heading = get_field('rail-cta_heading') ?: 'Quote &amp; Purchase Instantly' ?>
        <?php echo $heading; ?>
    </div>
  <?php endif; ?>
  <p class="cta__copy">
    <?php $text = get_field('rail-cta_text') ?: 'Our I-Bonds<sup>&reg;</sup> are available for instant quote, purchase, print or e-file on your desktop or mobile device.' ?>
    <?php echo $text; ?>
  </p>
  <a href="<?php echo get_field('rail-cta_button_url'); ?>" class="button cta__button">
    <?php $buttonText = get_field('rail-cta_button_text') ?: 'Get Started' ?>
    <?php echo $buttonText; ?>
  </a>
  <?php $includeCallNumber = get_field('rail-cta_include_call_number'); ?>
  <?php if($includeCallNumber): ?>
  <p class="cta__subcopy">
    <?php $callNumber = get_field('rail-cta_call_number') ?: '800-221-3662' ?>
    Or call <a href="tel:<?php echo preg_replace('/[^0-9]/', '',$callNumber); ?>"><?php echo $callNumber; ?></a>
  </p>
  <?php endif; ?>
</aside>
<?php endif; ?>