<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "NewsArticle",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "<?php echo get_the_permalink(); ?>"
  },
  "author": <?php echo $orgSchema; ?>,
  "headline": <?php echo to_json_string(get_the_title()); ?>,
  "image": "<?php echo get_the_post_thumbnail_url(get_the_id()); ?>",
  "datePublished": "<?php the_time('c'); ?>",
  "dateModified": "<?php the_modified_time('c'); ?>",
  "publisher": <?php echo $orgSchema; ?>,
  "description": <?php echo to_json_string(get_the_content()); ?>
}
</script>