<?php
 /**
  * Flexible Content - Features List
  */
?>
<?php if(have_rows('feature')) : ?>
<div class="wrapper">
    <div class="widgets_bottom">
        <div class="four-column-cta widget block">
            <div class="content">
                <div class="columns -three">
                <?php while(have_rows('feature')) : the_row(); ?>
                    <div class="column">
                        <?php if($image = get_sub_field('image')) : ?>
                            <img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['url']; ?>" />
                        <?php endif; ?>
                        <h3><?php echo get_sub_field('title'); ?></h3>
                        <div class="text"><?php echo get_sub_field('description', false, false); ?></div>
                    </div>
                <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
