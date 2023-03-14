
<div class="article__wrapper wrapper">
    <section id="expect">
        <h2><?php echo get_sub_field("title"); ?></h2>
        <?php if (have_rows("expect_card")):?>
            <div class="cards">
                <?php while (have_rows("expect_card")): the_row();
                $image = get_sub_field('icon');
                if (!empty($image)) {
                    $url = $image['url'];
                    $alt = $image['alt'];
                }
                ?>
                    <article class="card">
                        <div class="cardIcon">
                            <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                        </div>
                        <div>
                            <div class="cardTitile"><?php echo get_sub_field('card_titile'); ?></div>
                            <p><?php echo get_sub_field('card_content'); ?></p>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </section>
</div>