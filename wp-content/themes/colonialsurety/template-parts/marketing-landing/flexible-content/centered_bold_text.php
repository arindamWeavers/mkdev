<?php
/**
 * Flexible Content - Centered Bold Text
 */
$decorated = get_sub_field('decorated');
?>
<div class="wrapper">
    <div class="widgets_bottom">
        <div class="heading-block widget block">
            <div class="content">
                <?php if ($decorated) : ?>
                    <h2 class="title">
                        <span class="cell"></span><span><span><?php echo nl2br(get_sub_field('text', false, false)); ?></span></span><span
                                class="cell"></span>
                    </h2>
                <?php else : ?>
                    <h2 style="text-align: center;">
                        <?php echo nl2br(get_sub_field('text', false, false)); ?>
                    </h2>
                <?php endif; ?>
                <?php if (get_sub_field('cta_button')) : ?>
                    <a class="button red-full" href="<?php echo get_sub_field('button_link'); ?>" target="_blank">
                        <?php echo get_sub_field('button_text'); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
