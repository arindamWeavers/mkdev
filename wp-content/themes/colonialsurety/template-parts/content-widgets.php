<?php
/**
 * Template part for displaying widgets.
 *
 *
 * @package colonialsurety
 */

?>

<?php
global $preset_widget_field;
global $widgets_field;
global $_category;
global $widget_name;
global $widgets;
global $widget_options;

// Don't regrab widgets if we don't have to
if( ! $widgets || $widgets_field !== $preset_widget_field )
{
    if (!$widgets_field)
        $widgets_field = 'widgets';
    
    if (is_category($_category))
        $widgets = get_field($widgets_field, $_category);
    else
        $widgets = get_field($widgets_field);
}

$preset_widget_field == $widgets_field;

if (is_array($widgets)) {
    ?>
    <div class="<?php echo $widgets_field ?>">
        <?php
        foreach ($widgets as $item) {
            if( $widget_name && $widget_name !== $item['acf_fc_layout'] )  { continue; }

            $widget = !empty($item[$item['acf_fc_layout']]) ? $item[$item['acf_fc_layout']] : false;

            switch ($item['acf_fc_layout']) {
                case 'rotating_banner':
                    ?>
                    <div class="slider rotating-banner block <?php echo $widget['animation'] ?>">
                        <?php
                        foreach ($widget['slides'] as $slide) {
                            if ($slide['title']):
                                ?>
                                <div class="slide<?php echo($slide['content_animation'] == 1 ? ' animate' : '') ?>"<?php if ($slide['image']) echo 'style="background-image:url(' . $slide['image']['url'] . ')"'; ?>>
                                    <div class="wrapper">
                                        <div class="slide-content <?php echo $widget['alignment'] ?>">
                                            <?php $title_tag = !is_array($slide['title_tag']) ? $slide['title_tag'] : $slide['title_tag'][0]; ?>
                                            <?php echo "<{$title_tag}>{$slide['title']}</{$title_tag}>"; ?>
                                            <div class="description"><?php echo $slide['description'] ?></div>
                                            <?php if ($slide['show_search_bar']) {
                                                ?>
                                                <div class="search-bar">
                                                    <?php get_search_form(); ?>
                                                </div>
                                                <?php
                                            }

                                            if ($slide['features']) {
                                                ?>
                                                <div class="features">
                                                    <?php
                                                    foreach ($slide['features'] as $feature) {
                                                        ?>
                                                        <a<?php if ($feature['link']) echo ' class="link" href="' . $feature['link'] . '"'; ?>>
                                                            <?php
                                                            if ($feature['image']) {
                                                                ?>
                                                                <img alt="<?php echo $feature['title'] ?>"
                                                                     src="<?php echo $feature['image']['url'] ?>">
                                                                <?php
                                                            }
                                                            ?>
                                                            <span><?php echo $feature['title']; ?></span>
                                                        </a>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <?php
                                            }

                                            if ($slide['button']['link']) {
                                                ?>
                                                <a class="button white<?php echo($slide['button']['video'] ? ' fancybox fancybox.iframe' : '') ?> <?php echo "{$slide['title']}"; ?>"
                                                   href="<?php echo $slide['button']['link'] ?>"<?php if ($slide['button']['open_in_new_window']) echo ' target="_blank"'; ?>><?php echo($slide['button']['title'] == '' ? 'view more' : $slide['button']['title']) ?></a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endif;
                        }
                        ?>
                    </div>
                    <?php
                    break;

                case 'four_column_cta':
                    ?>
                    <div class="four-column-cta widget block" <?php echo($widget['background']['type'] == 'color' ? 'style="background-color:' . $widget['background']['color'] . '"' : ($widget['background']['type'] == 'image' ? 'style="background-image:url(' . $widget['background']['image'] . ')"' : '')) ?>>
                        <div class="wrapper">
                            <div class="content">
                                <?php
                                if ($widget['title']) {
                                    ?>
                                    <div class="title">
                                        <span class="cell"></span>
                                        <?php $title_tag = !is_array($widget['title_tag']) ? $widget['title_tag'] : $widget['title_tag'][0]; ?>
                                        <?php echo "<{$title_tag}>{$widget['title']}</{$title_tag}>"; ?>
                                        <span class="cell"></span>
                                    </div>
                                    <?php
                                }

                                if (is_array($widget['columns'])){
                                ?>
                                <div class="columns">
                                    <?php
                                    foreach ($widget['columns'] as $column) {
                                        ?>
                                        <div class="column">
                                        <?php
                                        if ($column['image']) {
                                            ?>
                                            <img alt="<?php echo $column['title'] ?>"
                                                 src="<?php echo $column['image']['url'] ?>">
                                            <?php
                                        }
                                        ?>
                                        <?php $title_tag = !is_array($column['title_tag']) ? $column['title_tag'] : $column['title_tag'][0]; ?>
                                        <?php echo "<{$title_tag}>{$column['title']}</{$title_tag}>"; ?>
                                        <div class="text"><?php echo $column['text'] ?></div>
                                        </div><?php
                                    }
                                    }
                                    ?>
                                </div>
                                <?php
                                if ($widget['button']['link']) {
                                    ?>
                                    <a class="button red<?php echo($widget['button']['video'] ? ' fancybox fancybox.iframe' : '') ?> <?php echo strtolower("{$widget['title']}"); ?>"
                                       href="<?php echo $widget['button']['link'] ?>"<?php if ($widget['button']['open_in_new_window']) echo ' target="_blank"'; ?>><?php echo($widget['button']['title'] == '' ? 'view more' : $widget['button']['title']) ?></a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    break;

                case 'basic_cta':
                    ?>
                    <div class="basic-cta widget block" <?php echo($widget['background']['type'] == 'color' ? 'style="background-color:' . $widget['background']['color'] . '"' : ($widget['background']['type'] == 'image' ? 'style="background-image:url(' . $widget['background']['image'] . ')"' : '')) ?>>
                        <div class="wrapper">
                            <div class="content">
                                <?php
                                if ($widget['title']) {
                                    ?>
                                    <div class="title">
                                        <span class="cell"></span>
                                        <?php $title_tag = !is_array($widget['title_tag']) ? $widget['title_tag'] : $widget['title_tag'][0]; ?>
                                        <?php echo "<{$title_tag}>{$widget['title']}</{$title_tag}>"; ?>
                                        <span class="cell"></span>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="text"><?php echo $widget['text'] ?></div>

                                <?php
                                if ($widget['features']) {
                                    ?>
                                    <div class="features">
                                        <?php
                                        foreach ($widget['features'] as $feature) {
                                            ?>
                                            <a<?php if ($feature['link']) echo ' class="link" href="' . $feature['link'] . '"'; ?>>
                                                <?php
                                                if ($feature['image']) {
                                                    ?>
                                                    <img alt="<?php echo $feature['title'] ?>"
                                                         src="<?php echo $feature['image']['url'] ?>">
                                                    <?php
                                                }
                                                ?>
                                                <?php $title_tag = !is_array($feature['title_tag']) ? $feature['title_tag'] : $feature['title_tag'][0]; ?>
                                                <?php echo "<{$title_tag}>{$feature['title']}</{$title_tag}>"; ?>
                                            </a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>

                                <?php
                                if ($widget['menus'] || $widget['button']['link']) {
                                    ?>
                                    <div class="foot<?php echo($widget['menus'] !== false ? ' has-menu' : '') ?>">
                                        <?php
                                        if ($widget['menus']) {
                                            foreach ($widget['menus'] as $m) {
                                                wp_nav_menu(array(
                                                    'menu' => $m['menu']->slug,
                                                    'menu_id' => $m['menu']->slug,
                                                    'walker' => new Walker_Nav_Menu_Dropdown(),
                                                    'container_class' => 'cta-menu',
                                                    'items_wrap' => '<label class="view">' . __('select to view:', 'colonialsurety') . '</label><select id="sel-' . $m['menu']->slug . '" class="dd"><option>' . $m['title'] . '</option>%3$s</select>'
                                                ));
                                            }
                                        }

                                        if (!empty($widget['use_button']) && $widget['button']['link']) {
                                            ?>
                                            <div class="cta-menu"><a
                                                        class="button red<?php echo($widget['button']['video'] ? ' fancybox fancybox.iframe' : '') ?>"
                                                        href="<?php echo $widget['button']['link'] ?>"<?php if ($widget['button']['open_in_new_window']) echo ' target="_blank"'; ?>><?php echo($widget['button']['title'] == '' ? 'view more' : $widget['button']['title']) ?></a>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <div style="clear: both"></div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    break;

                case 'testimonials':
                    if (is_array($widget['testimonials'])):
                        ?>
                        <div class="testimonials widget block" <?php echo($widget['background']['type'] == 'color' ? 'style="background-color:' . $widget['background']['color'] . '"' : ($widget['background']['type'] == 'image' ? 'style="background-image:url(' . $widget['background']['image'] . ')"' : '')) ?>>
                            <div class="wrapper">
                                <div class="content">
                                    <?php
                                    if ($widget['title']) {
                                        ?>
                                        <div class="title">
                                            <span class="cell"></span>
                                            
                                            <?php $title_tag = !is_array($widget['title_tag']) ? $widget['title_tag'] : $widget['title_tag'][0]; ?>
                                            <?php echo "<{$title_tag}>{$widget['title']}</{$title_tag}>"; ?>
                                            
                                            <span class="cell"></span>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div class="default slider">
                                        <?php

                                        foreach ($widget['testimonials'] as $testimonial) {
                                            ?>
                                            <div class="slide">
                                                <div class="testimonial">
                                                    <div class="text"><?php echo $testimonial->post_content; ?></div>
                                                    <p class="by"><?php echo $testimonial->post_title; ?></p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    endif;
                    break;

                case 'image_cta':
                    ?>
                    <div class="image-cta block">
                        <div class="wrapper">
                            <div class="content <?php echo strtolower($widget['image_alignment']); ?>">
                                <div class="image"
                                     style="background-image: url(<?php echo $widget['image']['url']; ?>)"></div>
                                <div class="info">
                                    <h2><?php echo $widget['title'] ?></h2>
                                    <?php
                                    if ($widget['subtitle']) {
                                        ?>
                                        <h3><span><?php echo $widget['subtitle'] ?></span></h3>
                                        <?php
                                    }

                                    if ($widget['text']) {
                                        ?>
                                        <div class="text"><?php echo $widget['text'] ?></div>
                                        <?php
                                    }

                                    if ($widget['button']['link']) {
                                        ?>
                                        <a class="button white<?php echo($widget['button']['video'] ? ' fancybox fancybox.iframe' : '') ?>"
                                           href="<?php echo $widget['button']['link'] ?>"<?php if ($widget['button']['open_in_new_window']) echo ' target="_blank"'; ?>><?php echo($widget['button']['title'] == '' ? 'view more' : $widget['button']['title']) ?></a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    break;

                case 'products':
                    ?>
                    <div class="products-widget widget block" <?php echo($widget['background']['type'] == 'color' ? 'style="background-color:' . $widget['background']['color'] . '"' : ($widget['background']['type'] == 'image' ? 'style="background-image:url(' . $widget['background']['image'] . ')"' : '')) ?>>
                        <div class="wrapper">
                            <div class="content">
                                <?php
                                if ($widget['title']) {
                                    ?>
                                    <div class="title">
                                        <span class="cell"></span>
                                        <?php $title_tag = !is_array($widget['title_tag']) ? $widget['title_tag'] : $widget['title_tag'][0]; ?>
                                        <?php echo "<{$title_tag}>{$widget['title']}</{$title_tag}>"; ?>
                                        <span class="cell"></span>
                                    </div>
                                    <?php
                                }

                                foreach ($widget['rows'] as $row) {
                                    foreach ($row['columns'] as $key => $column) {
                                        if (!$column['title'] && !$column['description']):
                                            unset($row['columns'][$key]);
                                        endif;
                                    }
                                    ?>
                                    <div class="row cols-<?php echo count($row['columns']) . ' ' . $widget['type'] ?>">
                                        <?php
                                        $i = 0;

                                        foreach ($row['columns'] as $column) {

                                            $i++;
                                            ?>
                                            <div
                                            class="column product<?php echo($column['hover_background']['url'] != '' ? ' has-bg' : '') ?>">

                                            <a <?php echo($column['button']['link'] ? 'href="' . $column['button']['link'] . '"' : '') ?><?php if ($column['button']['open_in_new_window']) echo ' target="_blank"'; ?>
                                                    class="box<?php echo($column['watermark'] ? ' watermark' : '') ?> <?php echo (empty($column['show_link']))? '' : 'show-button'; ?>">

                                                <div class="hover-bg<?php echo($column['blue'] ? ' blue' : '') ?>"
                                                     style="<?php echo($column['hover_background']['url'] != '' ? ' background-image: url(' . $column['hover_background']['url'] . ')' : '') ?>"></div>

                                                <?php $title_tag = !is_array($column['title_tag']) ? $column['title_tag'] : $column['title_tag'][0]; ?>
                                                <?php echo "<{$title_tag}>{$column['title']}</{$title_tag}>"; ?>
                                                <div class="text"><?php echo $column['description']; ?></div>

                                                <?php
                                                if ($column['button']['link']) {
                                                    ?>
                                                    <span class="button"><span><?php echo($column['button']['title'] ? $column['button']['title'] : 'apply online') ?></span></span>
                                                    <?php
                                                }
                                                ?>
                                            </a>

                                            </div><?php
                                            //endif;
                                        }
                                        ?>
                                    </div>

                                    <?php
                                }
                                ?>
                                <div style="clear: both"></div>
                                <?php
                                if ($widget['button']['link']) {
                                    ?>
                                    <a class="button red<?php echo($widget['button']['video'] ? ' fancybox fancybox.iframe' : '') ?>"
                                       href="<?php echo $widget['button']['link'] ?>"<?php if ($widget['button']['open_in_new_window']) echo ' target="_blank"'; ?>><?php echo($widget['button']['title'] == '' ? 'view more' : $widget['button']['title']) ?></a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    break;

                case 'team':
                    ?>
                    <div class="team-widget widget block" <?php echo($widget['background']['type'] == 'color' ? 'style="background-color:' . $widget['background']['color'] . '"' : ($widget['background']['type'] == 'image' ? 'style="background-image:url(' . $widget['background']['image'] . ')"' : '')) ?>>
                        <div class="wrapper">
                            <div class="content">
                                <?php
                                if ($widget['title']) {
                                    ?>
                                    <div class="title">
                                        <span class="cell"></span>
                                        <h2><?php echo $widget['title'] ?></h2>
                                        <span class="cell"></span>
                                    </div>
                                    <?php
                                }
                                ?>

                                <div class="columns">
                                    <?php
                                    foreach ($widget['staff'] as $item) {
                                        if(empty($item['person'])) continue;
                                        $img = wp_get_attachment_image_src(get_post_thumbnail_id($item['person']->ID), 'team-thumbnail');

                                        ?>
                                        <div class="column team">
                                        <div class="image" style="background-image: url(<?php echo $img[0] ?: get_template_directory_uri() . '/images/team/placeholder.png'; ?>)">
                                            <?php /*<a href="<?php echo esc_attr(get_permalink($item['person'])); ?>"></a>*/ ?>
                                        </div>
                                        <h3>
                                            <?php /*<a href="<?php echo esc_attr(get_permalink($item['person'])); ?>"><?php echo $item['person']->post_title; ?></a>*/ ?>
                                            <?php echo $item['person']->post_title; ?>
                                        </h3>
                                        <div class="position"><?php echo get_field('position', $item['person']); ?></div>
                                        <div class="email"><a
                                                    href="mailto:<?php echo get_field('email', $item['person']); ?>"><?php echo get_field('email', $item['person']); ?></a>
                                        </div>
                                        <div class="telephone"><a
                                                    href="tel:<?php echo get_field('telephone', $item['person']); ?>"><?php echo get_field('telephone', $item['person']); ?></a>
                                        </div>
                                        </div><?php
                                    }
                                    ?>
                                </div>

                                <?php
                                if ($widget['button']['link']) {
                                    ?>
                                    <a class="button red<?php echo($widget['button']['video'] ? ' fancybox fancybox.iframe' : '') ?>"
                                       href="<?php echo $widget['button']['link'] ?>"<?php if ($widget['button']['open_in_new_window']) echo ' target="_blank"'; ?>><?php echo($widget['button']['title'] == '' ? 'view more' : $widget['button']['title']) ?></a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    break;

                case 'contact_form':
                    ?>
                    <div class="contact widget block <?php echo $widget['header_type'] ?>" <?php echo($widget['background']['type'] == 'color' ? 'style="background-color:' . $widget['background']['color'] . '"' : ($widget['background']['type'] == 'image' ? 'style="background-image:url(' . $widget['background']['image'] . ')"' : '')) ?>>
                        <div class="wrapper">
                            <div class="content">
                                <?php
                                if ($widget['title']) {
                                    ?>
                                    <div class="title">
                                        <span class="cell"></span>
                                        <h2><?php echo $widget['title'] ?></h2>
                                        <span class="cell"></span>
                                    </div>
                                    <?php
                                }
                                if ($widget['description']) {
                                    ?>
                                    <div class="text"><?php echo $widget['description'] ?></div>
                                    <?php
                                }
                                ?>
                                <div class="form-container<?php echo($widget['has_border'] ? ' border' : '') ?>"<?php echo($widget['width'] ? ' style="width:' . $widget['width'] . '%"' : ''); ?>>
                                    <?php

                                    echo do_shortcode('[contact-form-7 id="' . $widget['form']->ID . '" title="' . $widget['form']->post_title . '"]')
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
                    </div>
                    <?php
                    break;
                case 'linked_map':
                    $field = get_field_object('field_59ef2336e0262');
                    $widget = $item['locations'];
                    $prepared_locations = array(
                        'link_text' => !empty($widget['read_more_text']) ? $widget['read_more_text'] : __('view more'),
                        'locations' => array(),
                    );
                    foreach($widget['location'] as $location) {
                        $location['title'] = @$field['choices'][$location['region']];
                        $prepared_locations['locations'][] = $location;
                    }

                    ?>
                    
                    <div class="linked-map-widget widget block">
                        <div class="wrapper">
                            <?php if(!empty($widget['title'])) : ?>
                                <div class="title">
                                    <span class="cell"></span>
                                    <h2><?php echo $widget['title'] ?></h2>
                                    <span class="cell"></span>
                                </div>
                            <?php endif; ?>
                            <div class="content">
                                <?php echo !empty($widget['description']) ? '<div class="linked-map__desc">' . $widget['description'] . '</div>' : ''; ?>
                                <div class="js-linked-map linked-map">
                                    <div class="linked-map__wr">
                                        <div class="js-linked-map__view linked-map__view"></div>
                                        <div class="js-linked-map__popup linked-map__popup">
                                            <div class="js-linked-map__popup-content linked-map__popup-content"></div>
                                        </div>
                                        <a href="#link" class="js-linked-map__other linked-map__other"><?php echo __('other U.S. territories'); ?></a>
                                        <div class="js-linked-map__tooltip linked-map__tooltip"></div>
                                    </div>
                                </div>
                                <script>
                                    var MAP_DATA = <?php echo json_encode($prepared_locations); ?>;
                                </script>
                                <script type="text/x-tmpl" id="tmpl-map-popup">
                                    <a href="#link" class="js-linked-map__popup-close linked-map__popup-close"></a>
                                    <h3 class="linked-map__popup-title">{%= o.title %}</h3>
                                    <a class="linked-map__popup-link" href="{%= o.url %}">{%= o.btn_text %}</a>
                                </script>
                            </div>
                        </div>
                    </div>

                    <?php
                    break;
                case 'bond_classification_dropdown' :
                    $items = array();
                    $bond_classification_items = get_field('bond_classification_items', 'option');
                    $options = $item['options'];
                    
                    $iterator = 1;
                    if(!empty($options['options']) && is_array($options['options'])) {
                        foreach ($options['options'] as $data) {
                            $url_link  = $data['url_link'];
                            $page_link = $data['page_link'];
                            $_item = [
                                'title'    => $data['bond_detail'],
                                'url_link' => $data['url_link_type'] ? $url_link : $page_link,
                                'attr'     => $data['url_link_type'] ?: 'target="_blank" rel="nofollow"',
                            ];
                            $items[$_item['title'] . $iterator++] = $_item;
                        }
                    }

                    foreach($bond_classification_items as $index => $data) {
                        $url_link     = $options['option_'.$data['identifier']]['url_link'];
                        $page_link    = $options['option_'.$data['identifier']]['page_link'];
                        $default_link = $data['default_url_link'];
                        $_item = [
                            'title' => $data['title'],
                        ];
                        if($options['option_'.$data['identifier']]['use_default'] && !empty($default_link)) {
                            $_item['url_link'] = $default_link;
                            $_item['attr']   = 'target="_blank" rel="nofollow"';
                        } elseif(!empty($url_link) || !empty($page_link)) {
                            $_item['url_link'] = $options['option_'.$data['identifier']]['url_link_type'] ? $url_link : $page_link;
                            $_item['attr']   = $options['option_'.$data['identifier']]['url_link_type'] ? 'target="_blank" rel="nofollow"' : '';
                        } else {
                            continue;
                        }
                        $items[$_item['title'] . $iterator++] = $_item;
                    }

                    ksort($items);
                ?>
                    <div class="bond-widget widget block">
                        <div class="content">
                            <?php if(!empty($item['description'])) : ?>
                                <div class="description"><?php echo $item['description']; ?></div>
                            <?php endif; ?>
                            <div class="bond-widget__select">
                                    <select class="j-select" <?php if($widget_options && isset($widget_options['default_text'])):?><?php echo "data-placeholder=\"{$widget_options['default_text']}\""; ?> <?php endif; ?>>
                                    <option></option>
                                    <?php foreach($items as $_item) : ?>
                                        <option value="<?php echo $_item['url_link']; ?>" data-target="<?php echo $_item['attr'] ?: ''; ?>"><?php echo $_item['title']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                <?php
                    break;
                case 'trust_pilot' :
                ?>
                <div class="trust-pilot widget">
                    <div class="wrapper">
                        <div class="content">
                            <?php echo get_field('trust_pilot_widget_code', 'options', false); ?>
                        </div>
                    </div>
                </div>
                <?php
                    break;
            }
        }
        ?>
    </div>
    <?php
}
?>
