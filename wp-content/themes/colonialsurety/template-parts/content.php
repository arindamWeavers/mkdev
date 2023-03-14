<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package colonialsurety
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('column'); ?>>

    <?php

    if ( !is_single() && isBlog() )://is_category(get_category_by_slug('blog')) ) : ?>
        <?php
            $url = get_the_post_thumbnail_url('');

            if (empty( $url ))
                $url = get_field('filler_image', 'options')['url'];
        ?>
    <div class="image" style="background-image: url(<?php echo $url;?>)">
        <a href="<?php echo esc_attr(get_permalink())?>"></a>
	</div>
    <?php endif;?>

    <header class="entry-header">
        <?php

        if ( is_single() ) {
            //the_title( '<h1 class="entry-title">', '</h1>' );
        } else {
        ?>
            <!-- <a href="#" class="share"></a>
            <div class="share-box">
                <span st_title="<?php echo esc_attr(get_the_title())?>" st_url="<?php echo esc_attr(get_permalink())?>" class='st_facebook_large' displayText='Facebook'></span>
                <span st_title="<?php echo esc_attr(get_the_title())?>" st_url="<?php echo esc_attr(get_permalink())?>" class='st_twitter_large' displayText='Tweet'></span>
                <span st_title="<?php echo esc_attr(get_the_title())?>" st_url="<?php echo esc_attr(get_permalink())?>" class='st_linkedin_large' displayText='LinkedIn'></span>
                <span st_title="<?php echo esc_attr(get_the_title())?>" st_url="<?php echo esc_attr(get_permalink())?>" class='st__large' displayText=''></span>
                <span st_title="<?php echo esc_attr(get_the_title())?>" st_url="<?php echo esc_attr(get_permalink())?>" class='st_googleplus_large' displayText='Google +'></span>
                <span st_title="<?php echo esc_attr(get_the_title())?>" st_url="<?php echo esc_attr(get_permalink())?>" class='st_email_large' displayText='Email'></span>
            </div> -->
        <?php
            if ( isBlog() ):
                if (is_category()):
                    $category = get_category($cat);
                else:
                    $term = wp_get_post_categories($post->ID, array('exclude'=>get_category_by_slug('featured')->term_id))[0];
                    if ($term)
                        $category = get_category($term);
                endif;

            elseif ( isJobs() ):
                if (is_tag()):
                    $category = get_category(get_query_var('tag_id'));
                else:
                    $term = wp_get_post_terms($post->ID, 'department')[0];
                    if ($term)
                        $category = get_category($term);
                endif;
            endif;

            //if (is_array($categories)):
            if (!empty($category)):
            ?>

            <ul class="post-categories">
                <?php
                //foreach ($categories as $cat) {
                ?>
                    <li><a rel="category" href="<?php echo esc_attr(get_term_link($category))?>" style="background-color: <?php echo get_field('color', $category)?>"><?php echo $category->name?></a></li>
                <?php
                //}
                ?>
            </ul>
            <?php
            endif;

            if ( !is_search() ):
            ?>
            <div class="entry-meta">
                <?php colonialsurety_posted_on(); ?>
            </div><!-- .entry-meta -->
            <?php
            else:
            ?>
                <br/>
            <?php
            endif;

            $title_tag = isJobs() ? 'h2' : 'h4';
            the_title( '<' . $title_tag . ' class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></' . $title_tag . '>' );
        }

        ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
            /*
			the_content( sprintf(

				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'colonialsurety' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
            */
            if ( is_single() ) {
                ?>
                <div class="sharethis-inline-share-buttons"></div>
                <div class="share top">
                    <span class='st_facebook_large' displayText='Facebook'></span>
                    <span class='st_twitter_large' displayText='Tweet'></span>
                    <span class='st_linkedin_large' displayText='LinkedIn'></span>
                    <span class='st__large' displayText=''></span>
                    <span class='st_googleplus_large' displayText='Google +'></span>
                    <span class='st_email_large' displayText='Email'></span>
                </div>
                <?php
                global $more;
                $more = 0;
                ?>

                <?php the_content('Continue Reading'); ?>
                <?php

                if (is_singular('job') && !is_null($cf = get_field('job_form', 'options'))){
                ?>
                    <div class="apply-box">
                        <a class="button red small apply-now" href="#">apply now</a>
                        <a class="apply-linkedin" href="#"><img alt="Apply with Linkedin" src="<?php echo get_template_directory_uri()?>/images/apply-default.png"></a>
                    </div>
                    <div class="contact widget block">
                        <div class="content">

                            <div class="form-container border">
                                <?php
                                echo do_shortcode('[contact-form-7 id="' . $cf->ID . '" title="' . $cf->post_title . '"]');
                                ?>
                            </div>

                            <?php
                            /*
                            if ($widget['button']['title']){
                                ?>
                                <a class="button red<?php echo ($widget['button']['video'] ? ' fancybox fancybox.iframe' : '') ?>" href="<?php echo $widget['button']['link']?>"<?php if ($widget['button']['open_in_new_window']) echo ' target="_blank"';?>><?php echo $widget['button']['title']?></a>
                            <?php
                            }
                            */

                            ?>
                        </div>
                    </div>
                <?php
                }elseif (is_singular('post')){
                ?>
                    <div class="share bottom">
                        <span class='st_facebook_large' displayText='Facebook'></span>
                        <span class='st_twitter_large' displayText='Tweet'></span>
                        <span class='st_linkedin_large' displayText='LinkedIn'></span>
                        <span class='st__large' displayText=''></span>
                        <span class='st_googleplus_large' displayText='Google +'></span>
                        <span class='st_email_large' displayText='Email'></span>
                    </div>
                <?php
                }
            } else {
                //the_excerpt();
                echo '<p>' . get_field('description') . '</p>';
                if (get_field('show_view_more')):
                    echo '<a class="view-more" href="'. get_permalink($post->ID) . '"><span>learn more</span></a>';
                endif;

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'colonialsurety' ),
                    'after'  => '</div>',
                ) );
            }

		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //colonialsurety_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
