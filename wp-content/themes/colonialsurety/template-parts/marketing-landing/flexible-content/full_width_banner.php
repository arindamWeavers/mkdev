<?php
 /**
  * Flexible Content - Full Width Banner
  */

$image = get_sub_field('image');
?>

<header class="header-banner overlay" <?php if($image) : ?>style="background-image: url(<?php echo $image['url'];?>)"<?php endif; ?>>
    <div class="wrapper">
    <?php if($title = get_sub_field('title')) : ?>
        <h1 class="title"><?php echo $title; ?></h1>
    <?php endif; ?>
    <?php if($subtitle = get_sub_field('subtitle')) : ?>
        <h2 class="sup-title"><?php echo $subtitle; ?></h2>
    <?php endif; ?>
    </div>
</header>
