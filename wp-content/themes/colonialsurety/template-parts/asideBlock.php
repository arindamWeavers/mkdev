<?php
$title = get_sub_field('title');
$body = get_sub_field('side_content');
?>
<aside class="reptile rail__block" role="complementary" aria-labelledby="reptile-header">
    <h4 class="reptile__heading" id="reptile-header"><?php echo $title ?></h4>
    <div class="reptile__content"><?php echo $body ?></div>
</aside>