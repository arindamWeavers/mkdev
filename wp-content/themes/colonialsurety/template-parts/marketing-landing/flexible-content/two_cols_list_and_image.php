<?php
/**
 * Flexible Content - List and Image
 */
?>
<div class="wrapper">
    <div class="widgets_bottom">
        <div class="two-column-cta image-list-cta widget block">
            <div class="text-block">
                    <h2><?php echo get_sub_field('title'); ?></h2>
                    <?php if (have_rows('list')) : ?>
                        <ul class="bulleted-list">
                            <?php while (have_rows('list')) : the_row(); ?>
                                <li>
                                    <?php echo get_sub_field('text_line'); ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
            </div>
            <div class="image-block">
                <?php if ($image = get_sub_field('image')) : ?>
                    <img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['url']; ?>"/>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

