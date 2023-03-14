<?php
 /**
  * Header Template for Marketing Landing Pages
  */
?>
<header id="masthead" class="site-header" role="banner">
    <?php if($coming_soon_message = get_field('coming_soon_message', 'options')) : ?>
        <div class="text-coming-soon"><?php echo $coming_soon_message; ?></div>
    <?php endif; ?>
    <div class="wrapper">
        <div class="site-branding">
            <p class="site-title">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <img src="<?php echo get_template_directory_uri() . '/images/logo.jpg'; ?>" alt="<?php echo bloginfo( 'name' ); ?>" title="<?php echo bloginfo( 'name' ); ?>" />
                </a>
            </p>
        </div>
        <?php 
            foreach(get_field('telephone_by_page', 'options', false) as $data) {
                $data = array_values($data);
                if(!empty($data[1]) && get_the_ID() == $data[1]) {
                    $tel = $data[0];
                    break;
                }
            }
            if(empty($tel)) {
                $telephoneField = 'telephone';
                $differPhoneNumberPages = get_field('additional_telephone_pages', 'options');
                if(is_array($differPhoneNumberPages) && in_array(get_the_ID(), $differPhoneNumberPages)) {
                    $telephoneField = 'additional_telephone';
                }
                $tel = get_field($telephoneField, 'options');
            }
        ?>
        <?php if(!empty($tel)) : ?>
            <?php
                preg_match_all('!\d+!', $tel, $matches);
                $strippedTel = isset($matches[0]) && is_array($matches[0]) ? implode('', $matches[0]) : $tel;
            ?>
            <span class="tel-number">
            <a href="tel:<?php echo $strippedTel; ?>"><?php echo $tel; ?></a>
                </span>
        <?php endif; ?>
    </div>
</header>
