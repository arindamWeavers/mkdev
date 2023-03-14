<?php
/**
 * Flexible Content - Video
 */
?>
<div class="wrapper">
    <div class="widgets_bottom">
        <div class="video-block widget block">
            <div class="content">
                <?php if ($title = get_sub_field('title')) : ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>
                <div class="video-holder">
                    <?php echo apply_filters('the_content', get_sub_field('embed_code')); ?>
                </div>
            </div>
        </div>
    </div>
</div>
