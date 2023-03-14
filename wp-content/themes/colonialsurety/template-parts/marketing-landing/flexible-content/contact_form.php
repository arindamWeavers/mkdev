<?php
/**
 * Flexible Content - Contact Form
 */

$data = get_sub_field('contact_form');
$background = '';
if($data['background'] !== false) {
    switch($data['background']['type']) {
        case 'color' :
            $background = 'style="background-color:' . $data['background']['color'] . '"';
            break;
        case 'image' :
            $background = 'style="background-image:url(' . $data['background']['image'] . ')"';
            break;
    }
}
?>
<?php if($form = $data['form']) : ?>
    <div class="wrapper">
        <div class="contact widget block <?php echo !empty($data['header_type']) ? $data['header_type'] : ''; ?>" <?php echo $background; ?>>
            <div class="content">
                <?php if(!empty($data['title'])) : ?>
                    <h2 class="title"><span class="cell"></span><span><span><?php echo $data['title'] ?></span></span><span class="cell"></span></h2>
                <?php endif; ?>
                
                <?php if(!empty($data['description'])) : ?>
                    <div class="text"><?php echo $data['description'] ?></div>
                <?php endif; ?>
            
                <div class="form-container<?php echo !empty($data['has_border']) ? ' border' : ''; ?>"<?php echo !empty($data['width']) ? ' style="width:' . $data['width'] . '%"' : ''; ?>>
                    <?php echo do_shortcode('[contact-form-7 id="' . $form->ID . '" title="' . $form->post_title . '"]') ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
