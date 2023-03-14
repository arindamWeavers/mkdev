<div id="primary" class="content-area">
    <main id="main" class="site-main<?php //category-echo getCurrentRootCategory()->slug ?>" role="main">

        <?php get_template_part( 'template-parts/content', 'header' );?>

        <div class="body">
            <div class="wrapper">
                
                
                <?php if(isJobs()) : ?>
                <div class="content">
                    <div class="title">
                        <span class="cell"></span><h1><?php echo get_the_title(); ?></h1><span class="cell"></span>
                    </div>
                </div>
                <?php endif; ?>
                
                <div class="content blog">
                    <?php
                    if (is_search()):
                        get_search_form();
                    ?>
                        <br/>
                    <?php
                    endif;
                    ?>
                    <?php
                    global $wp_query;
                    if ( isBlog() || ( (!is_search() && $wp_query->max_num_pages > 1 ) || (is_search() && $wp_query->max_num_pages > 1 && trim(get_search_query())!=='') ) ){
                        ?>
                        <div class="blog-header">
                            <?php

                            if (isBlog()):
                                ?>
                                <div class="filters">
                                    <label><?php echo __('filter by:', 'colonialsurety') ?></label>
                                    <input type="hidden" id="blog"
                                           value="<?php echo esc_attr(get_permalink(get_option('page_for_posts'))) ?>"/>


                                    <select id="categories">
                                        <option value="">categories</option>
                                        <?php
                                        $cats = get_categories();

                                        foreach ($cats as $_cat) {
                                            ?>
                                            <option<?php echo($cat == $_cat->term_id ? ' selected="selected"' : '') ?>
                                                value="<?php echo str_replace(site_url(), '', get_category_link($_cat)) ?>"><?php echo $_cat->name ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                    <select id="tags">
                                        <option value="">tags</option>
                                        <?php
                                        $cats = get_tags();

                                        foreach ($cats as $_cat) {
                                            ?>
                                            <option<?php echo(get_query_var('tag_id') == $_cat->term_id ? ' selected="selected"' : '') ?>
                                                value="<?php echo $_cat->slug ?>"><?php echo $_cat->name ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                    <select id="archives">
                                        <option value="">archives</option>
                                        <?php
                                        wp_get_archives(array('format' => 'option'));
                                        ?>
                                    </select>
                                </div>
                                <a href="#" class="button update red">update</a>
                            <?php
                            endif;
                            ?>

                            <div class="pagination"><?php echo paginate_links(); ?></div>
                        </div>
                    <?php
                    }

                    if ( have_posts() && (!is_search() || trim(get_search_query())!=='') ) :

                        /* Start the Loop */
                        $count = 0;
                        while ( have_posts() ) : the_post();

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */

                            if (!isBlog() || (empty($_GET['featured']) && strcmp($_GET['featured'], '0')!=0) || (strcmp($_GET['featured'], '1')==0 && strcmp(get_field('featured'), '1')==0) || ( strcmp($_GET['featured'], '0')==0 && get_field('featured')=='') ):
                                get_template_part( 'template-parts/content', get_post_format() );
                            $count ++;
                            endif;

                        endwhile;

                        if ($count > 0) {
                            ?>
                            <div style="clear: both"></div>
                            <?php
                            if ($wp_query->max_num_pages > 1) {
                                ?>
                                <div class="blog-footer">
                                    <div class="pagination"><?php echo paginate_links(); ?></div>
                                </div>
                            <?php
                            }
                        }else {
                            get_template_part('template-parts/content', 'none');
                        }
                        ?>

                    <?php

                    else :

                        get_template_part( 'template-parts/content', 'none' );

                    endif; ?>
                </div>
            </div>
        </div>
        <?php

        global $post;
        if (isBlog()):
            $post = get_post(get_option('page_for_posts'));
        else:
            $post = get_page_by_path('jobs');
        endif;

        get_template_part( 'template-parts/content', 'widgets' );
        ?>

    </main><!-- #main -->
</div><!-- #primary -->
