<?php
/**
 * Flexible Content - Testimonials
 */
?>
<div class="wrapper">
    <div class="testimonials widget block">
        <div class="content">
            <div class="text"><?php echo get_sub_field('text', false, false); ?></div>
            <p class="testimonials-author"><strong>-<?php echo get_sub_field('author'); ?></strong></p>
            <p class="by"> <em>-<?php echo get_sub_field('company'); ?></em></p>
        </div>
    </div>
</div>
