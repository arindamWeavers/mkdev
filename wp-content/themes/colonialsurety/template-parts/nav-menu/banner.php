<?php
/**
 * Nav Menu Banner
 */
global $is_nav_menu_banner_dropdown;
?>
<?php
$type = get_field('type', $item->object_id);
if ($type == 'image') :
    $image = get_field('image', $item->object_id);
    $imageUrl = !empty($image['sizes']['thumbnail']) ? $image['sizes']['thumbnail'] : (!empty($image['url']) ? $image['url'] : false);
    if ($imageUrl) :
        ?>
        <div class="widget-megamenu j-widget-megamenu">
            <?php if ($url_link = get_field('url_link', $item->object_id)) : ?>
            <a href="<?php echo $url_link; ?>">
                <?php endif; ?>
                <div class="widget-megamenu__banner" style="background-image: url('<?php echo $imageUrl; ?>');">
                    <?php if ($title = get_field('title', $item->object_id)) : ?>
                        <h3 class="widget-megamenu__title"><?php echo $title; ?></h3>
                    <?php endif; ?>
                </div>
                <?php if ($url_link) : ?>
            </a>
        <?php endif; ?>
        </div>
    <?php endif; ?>
<?php
elseif ($type == 'dropdown') :
    $is_nav_menu_banner_dropdown = true;
    $items = array();
    $bond_classification_items = get_field('bond_classification_items', 'option');
    $iterator = 1;

    $additional_options = get_field('dropdown_options', $item->object_id);
    if(!empty($additional_options) && is_array($additional_options)) {
        foreach ($additional_options as $data) {
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

    foreach ($bond_classification_items as $index => $data) {
        $options = get_field('dropdown_option_' . $data['identifier'], $item->object_id);
        if(! is_array($options)) {continue;}
        $url_link = $options['url_link'];
        $page_link = $options['page_link'];
        $default_link = $data['default_url_link'];
        $_item = [
            'title' => $data['title'],
        ];
        if ($options['use_default'] && !empty($default_link)) {
            $_item['url_link'] = $default_link;
            $_item['attr'] = 'target="_blank" rel="nofollow"';
        } elseif (!empty($url_link) || !empty($page_link)) {
            $_item['url_link'] = $options['url_link_type'] ? $url_link : $page_link;
            $_item['attr'] = $options['url_link_type'] ? 'target="_blank" rel="nofollow"' : '';
        } else {
            continue;
        }
        $items[$_item['title'] . $iterator++] = $_item;
    }

    ksort($items);
    ?>
    <div class="dropdown-nav-widget j-dropdown-nav-widget dropdown-widget">
        <div class="dropdown-nav-widget__banner">
            <?php if ($title = get_field('title', $item->object_id)) : ?>
                <h3 class="dropdown-nav-widget__title"><?php echo $title; ?></h3>
            <?php endif; ?>
            <?php if ($description = get_field('description', $item->object_id)) : ?>
                <div class="dropdown-nav-widget__descr"><?php echo $description; ?></div>
            <?php endif; ?>
            <div class="dropdown-nav-widget__select j-select-wrap">
                <select class="j-select-nav">
                    <option></option>
                    <?php foreach ($items as $_item) : ?>
                        <option value="<?php echo $_item['url_link']; ?>"
                                data-target="<?php echo $_item['attr'] ?: ''; ?>"><?php echo $_item['title']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
<?php endif; ?>