<?php
/**
 * colonialsurety functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package colonialsurety
 */

if ( ! function_exists( 'colonialsurety_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function colonialsurety_setup() {
    if( function_exists('acf_add_options_page') ) {

        acf_add_options_page('General Information');
    }
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on colonialsurety, use a find and replace
	 * to change 'colonialsurety' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'colonialsurety', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'colonialsurety' ),
        'top' => esc_html__( 'Top', 'colonialsurety' ),
        'footer' => esc_html__( 'Footer', 'colonialsurety' ),
        'social' => esc_html__( 'Social', 'colonialsurety' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
    /*
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );
    */

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'colonialsurety_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    remove_filter( 'nav_menu_description', 'strip_tags' );

    function my_plugin_wp_setup_nav_menu_item( $menu_item ) {
        if ( isset( $menu_item->post_type ) ) {
            if ( 'nav_menu_item' == $menu_item->post_type ) {
                $menu_item->description = apply_filters( 'nav_menu_description', $menu_item->post_content );
                //$menu_item->description = apply_filters( 'the_content', $menu_item->post_content );
            }
        }

        return $menu_item;
    }

    add_filter( 'wp_setup_nav_menu_item', 'my_plugin_wp_setup_nav_menu_item' );

    register_post_type( 'testimonial' , array(
        'public' => true,
        'has_archive' => false,
        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'label'  => 'Testimonials',
        //'labels' => array('singular_name'=>'Video'),
        //'description' => 'Hello there.',
        'rewrite' => array(
            'with_front' => false
        )
        //'labels' => $labels,
        //'capability_type' => 'post',
    ));

    register_post_type( 'team' , array(
        'public' => true,
        'has_archive' => false,
        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'label'  => 'Team',
        //'labels' => array('singular_name'=>'Video'),
        //'description' => 'Hello there.',
        'rewrite' => array(
            'with_front' => false
        ),
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'hierarchical' => true,
        //'labels' => $labels,
        //'capability_type' => 'post',
    ));
    add_image_size('team-thumbnail', 245, 245, true);

    register_taxonomy(
        'team_category',
        'team'
        ,array(
            'label' => __( 'Groups' ),
            'hierarchical' => true,
            'show_admin_column' => true
        )
    );

    register_post_type( 'job' , array(
        'public' => true,
        'has_archive' => true,
        //'publicly_queryable' => false,
        //'exclude_from_search' => true,
        'label'  => 'Jobs',
        //'labels' => array('singular_name'=>'Video'),
        //'description' => 'Hello there.',
        'rewrite' => array(
            'with_front' => true,
        ),
        'supports' => array('title', 'editor')
        //'labels' => $labels,
        //'capability_type' => 'post',
    ));

    register_taxonomy(
        'department',
        'job'
        ,array(
            'label' => __( 'Departments' ),
            'hierarchical' => true,
            'show_admin_column' => true
        )
    );

    register_post_type( 'career' , array(
        'public' => true,
        'has_archive' => true,
        'label'  => 'Careers',
        'rewrite' => array(
            'with_front' => true,
        ),
        'supports' => array('title', 'editor')
    ));

    register_taxonomy(
        'dept',
        'career'
        ,array(
            'label' => __( 'Departments' ),
            'hierarchical' => true,
            'show_admin_column' => true
        )
    );

    register_post_type( 'product' , array(
        'public'              => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => false,
        'supports'            => array('title','excerpt'),
        'has_archive'         => false,
        'rewrite'             => false,
        'query_var'           => false,
        'taxonomies'          => ['product_category'],
        'labels' => array(
            'name'                  => 'Products',
            'singular_name'         => 'Product',
            'menu_name'             => 'Products',
            'name_admin_bar'        => 'Products',
            'attributes'            => 'Product Attributes',
            'parent_item_colon'     => 'Parent Product:',
            'all_items'             => 'All Products',
            'add_new_item'          => 'Add New Product',
            'add_new'               => 'Add New',
            'new_item'              => 'New Product',
            'edit_item'             => 'Edit Product',
            'update_item'           => 'Update Product',
            'view_item'             => 'View Product',
            'view_items'            => 'View Products',
            'search_items'          => 'Search Product',
            'not_found'             => 'Not found',
            'not_found_in_trash'    => 'Not found in Trash',
            'featured_image'        => 'Featured Image',
            'set_featured_image'    => 'Set featured image',
            'remove_featured_image' => 'Remove featured image',
            'use_featured_image'    => 'Use as featured image',
            'insert_into_item'      => 'Insert into Product',
            'uploaded_to_this_item' => 'Uploaded to this Product',
            'items_list'            => 'Products list',
            'items_list_navigation' => 'Products list navigation',
            'filter_items_list'     => 'Filter Products list',
        )
    ));

    register_taxonomy(
        'product_category',
        'product',
        array(
            'label' => __( 'Categories' ),
            'hierarchical' => true,
            'show_admin_column' => true
        )
    );
    
    register_post_type('nav_menu_banner', array(
        'public' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'label'  => 'Nav Menu Widget',
        'rewrite' => array(
            'with_front' => false
        )
    ));

    function new_excerpt_length($length) {
        if (is_search())
            return 50;
        return 35;
    }
    add_filter('excerpt_length', 'new_excerpt_length');

    // Replaces the excerpt "more" text by a link
    function new_excerpt_more($more) {
        global $post;
        return '...<br /><a class="link" href="'. get_permalink($post->ID) . '">Read More<span class="sr-only">about '.$post->post_title . '</span></a>';
    }
    add_filter('excerpt_more', 'new_excerpt_more');

    function namespace_menu_classes( $classes , $item ){
        if ( is_singular('job') ) {
            // remove unwanted classes if found
            $classes = str_replace( 'current_page_parent', '', $classes );

            if ($item->object_id == get_page_by_path('jobs')->ID) {
                $classes[] = 'current_page_parent';
            }
        }
        return $classes;
    }
    add_filter( 'nav_menu_css_class', 'namespace_menu_classes', 10, 2 );

    function extend_date_archives_add_rewrite_rules($wp_rewrite) {
        $rules = array();
        $structures = array(
            //$wp_rewrite->get_category_permastruct() . $wp_rewrite->get_tag_permastruct(),
            $wp_rewrite->get_category_permastruct() . $wp_rewrite->get_month_permastruct(),

            //$wp_rewrite->get_category_permastruct() . $wp_rewrite->get_date_permastruct(),

            //$wp_rewrite->get_category_permastruct() . $wp_rewrite->get_year_permastruct(),

            //$wp_rewrite->get_category_permastruct() . $wp_rewrite->get_tag_permastruct() . $wp_rewrite->get_date_permastruct(),
            //$wp_rewrite->get_category_permastruct() . $wp_rewrite->get_tag_permastruct() . $wp_rewrite->get_month_permastruct(),
            //$wp_rewrite->get_category_permastruct() . $wp_rewrite->get_tag_permastruct() . $wp_rewrite->get_year_permastruct(),

            //$wp_rewrite->get_tag_permastruct() . $wp_rewrite->get_date_permastruct(),
            //$wp_rewrite->get_tag_permastruct() . $wp_rewrite->get_month_permastruct(),
            //$wp_rewrite->get_tag_permastruct() . $wp_rewrite->get_year_permastruct()
        );

        //echo $wp_rewrite->get_category_permastruct();// . $wp_rewrite->get_tag_permastruct();
        //echo $wp_rewrite->get_category_permastruct() . $wp_rewrite->get_tag_permastruct();exit;

        foreach( $structures as $s ){
            $rules += $wp_rewrite->generate_rewrite_rules($s);
            echo $s . '<br>';
        }
//exit;
        $wp_rewrite->rules = $rules + $wp_rewrite->rules;
    }
    add_action('generate_rewrite_rules', 'extend_date_archives_add_rewrite_rules');

    add_filter( 'get_archives_link', function( $html )
    {
        if( is_admin() ) // Just in case, don't run on admin side
            return $html;

        /*
        if (is_category()):
            global $cat;
            $html = str_replace( site_url() . '/', get_category_link( get_category($cat) ), $html );
        endif;
        */
        $html = str_replace( site_url() . '/', '', $html );

        preg_match ("/value='(.+?)'/", $html, $url);

        //$requested = "http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}";
        $requested = ( get_query_var('year') && get_query_var('monthnum') ? get_query_var('year') . '/' . str_pad( get_query_var('monthnum'), 2, '0', STR_PAD_LEFT ) : '') . '/';

        if ($requested == $url[1]) {
            $html = str_replace('<option', '<option selected="selected"', $html);
        }

        return $html;
    });

    /**
     * Hide editor on specific pages.
     */
    add_action( 'admin_init', 'hide_editor' );
    function hide_editor() {
        // Get the Post ID.
        $post_id = !empty($_GET['post']) ? $_GET['post'] : (!empty($_POST['post_ID']) ? $_POST['post_ID'] : false);
        if( empty( $post_id ) ) return;

        $frontpage_id = get_option( 'page_on_front' );
        $blogpage_id = get_option( 'page_for_posts' );
        $template = get_page_template_slug($post_id);
        $hidebytemplate = $template == 'jobs-template.php' || $template == 'products-list.php' || $template == 'products-grid.php' || $template == 'only-widgets.php' || $template == 'our-team-template.php';

        if($post_id == $frontpage_id || $post_id == $blogpage_id || $hidebytemplate){
            remove_post_type_support('page', 'editor');
        }
    }

    // add editor the privilege to edit theme

    // get the the role object
    $role_object = get_role( 'editor' );

    // add $cap capability to this role object
    $role_object->add_cap( 'edit_theme_options' );

    add_filter( 'wpcf7_validate_text', 'validate_zip_code', 10, 2 );
    add_filter( 'wpcf7_validate_text*', 'validate_zip_code', 10, 2 );

    function validate_zip_code( $result, $tag ) {
        $type = $tag['type'];
        $name = $tag['name'];

        if ( in_array('class:zip', $tag['options']) ) {
            $the_value = $_POST[$name];

            if ( trim( $the_value )!=='' && !validateUSAZip( $the_value ) ) {
                $result->invalidate( $tag, "ZIP Code is invalid" );
            }
        }

        return $result;
    }

    function validateUSAZip($zip_code)
    {
        if(preg_match("/^([0-9]{5})(-[0-9]{4})?$/i", $zip_code))
            return true;
        else
            return false;
    }

    function link_updates_callback($buffer) {
        if(is_admin()) return;
        $mapping = [	
            "live" => "quote.colonialsurety.com",	
            "test" => "stg.colonialsurety.com",	
            "csc-stg" => "stg.colonialsurety.com",	
            "uat" => "uat.colonialsurety.com",	
            "csc-uat" => "uat.colonialsurety.com",	
            "qa" => "qa.colonialsurety.com",	
            "csc-qa" => "qa.colonialsurety.com",	
        ];	
        // Links to applications updated to new application URL / UAT application URL	
        $appReplacement = $mapping[$_ENV['PANTHEON_ENVIRONMENT']] ?: $mapping['live'];	
        	
        // Make sure all links link within their specific environment / HOST URL
        $generalReplacement = $_ENV['PANTHEON_ENVIRONMENT'] === 'live' 
            ? 'www.colonialsurety.com' 
            : $_SERVER['HTTP_HOST'];

        // Specific replacement cases
        $buffer = str_replace('my.colonialdirect.com/quote',"$appReplacement/erisa_quote",$buffer);

        // Global
        $buffer = str_replace('my.colonialdirect.com',$appReplacement,$buffer);
        $buffer = str_replace('quote.colonialsurety.com',$appReplacement,$buffer);
        $buffer = str_replace('court.colonialdirect.com',"$appReplacement/court",$buffer);
        $buffer = str_replace('www.colonialsurety.com',$generalReplacement,$buffer);
        $buffer = str_replace('stage.colonialsurety.com',$generalReplacement,$buffer);
        
        $applicationPathMapping = [
            "/\/public_lp_quote\/([0-9]+)/" => "/quote/ibond/getquotes/landp?id=$1",
            "/\/ibond_license_and_permit_quote/" => "/quote/ibond/getquotes/landp",
            "/\/ibond_long_form_quotes\/new\?app_type\=License\+and\+Permit/" => "/quote/ibond/getquotes/landp",
            "/\/ibond_public_official_quote/" => "/quote/ibond/getquotes/po",
            "/\/ibond_airport_security_quote/" => "/quote/ibond/getquotes/airport_security",
            "/\/janitorial_home_services_bond/" => "/quote/ibond/getquotes/janitorial",
            "/\/employee_dishonesty_bond/" => "/quote/ibond/getquotes/employee_dishonesty",
            "/\/ibond_lost_instrument_quote/" => "/quote/ibond/getquotes/lost_instrument",
            "/\/ibond_notary_quote/" => "/quote/ibond/getquotes/notary",
            "/\/ibond_ria_quote/" => "/quote/ibond/getquotes/ria",
            "/\/ibond_va_fiduciary_quote/" => "/quote/ibond/getquotes/vafiduciary",
        ];

        foreach($applicationPathMapping as $pattern=>$replacement) {
            $buffer = preg_replace($pattern,$replacement,$buffer);
        }
        
        return $buffer;
    }
    
    function buffer_start() { ob_start("link_updates_callback"); }
    function buffer_end() { ob_end_flush(); }
    
    add_action('wp_head', 'buffer_start');
    add_action('wp_footer', 'buffer_end');


    function cc_mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
    add_filter('upload_mimes', 'cc_mime_types');
}
endif;
add_action( 'after_setup_theme', 'colonialsurety_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function colonialsurety_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'colonialsurety_content_width', 640 );
}
add_action( 'after_setup_theme', 'colonialsurety_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function colonialsurety_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'colonialsurety' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'colonialsurety' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'colonialsurety_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function colonialsurety_scripts() {
	wp_enqueue_style( 'colonialsurety-style', get_stylesheet_uri() );

    wp_enqueue_style( 'colonialsurety-select2-css', get_template_directory_uri() . '/css/select2.css', array(), filemtime(get_stylesheet_directory() . '/css/select2.css') );

    wp_enqueue_style( 'colonialsurety-custom-style', get_template_directory_uri() . '/main.css', array(), filemtime(get_stylesheet_directory() . '/main.css') );

    wp_enqueue_style( 'colonialsurety-custom-style-v2', get_template_directory_uri() . '/v2.css', array(), filemtime(get_stylesheet_directory() . '/v2.css') );

    wp_enqueue_style( 'colonialsurety-slick-css', get_template_directory_uri() . '/css/slick.css', array(), filemtime(get_stylesheet_directory() . '/css/slick.css') );
    wp_enqueue_style( 'colonialsurety-fancybox-css', get_template_directory_uri() . '/css/jquery.fancybox.css', array(), filemtime(get_stylesheet_directory() . '/css/jquery.fancybox.css') );

    wp_enqueue_script('jquery');

    wp_enqueue_script( 'colonialsurety-ddslick', get_template_directory_uri() . '/js/jquery.ddslick.js', array(), filemtime(get_stylesheet_directory() . '/js/jquery.ddslick.js'), true );

    wp_enqueue_script( 'colonialsurety-select2', get_template_directory_uri() . '/js/select2.min.js', array(), filemtime(get_stylesheet_directory() . '/js/select2.min.js'), true );

    wp_enqueue_script( 'colonialsurety-main', get_template_directory_uri() . '/js/main.js', array(), filemtime(get_stylesheet_directory() . '/js/main.js'), true );

    wp_enqueue_script( 'colonialsurety-functions', get_template_directory_uri() . '/js/functions.js', array(), filemtime(get_stylesheet_directory() . '/js/functions.js'), true );

    wp_enqueue_script( 'colonialsurety-hotfix', get_template_directory_uri() . '/js/hotfix.js', array(), filemtime(get_stylesheet_directory() . '/js/hotfix.js'), true );

    wp_enqueue_script( 'colonialsurety-slick', get_template_directory_uri() . '/js/slick.min.js', array(), filemtime(get_stylesheet_directory() . '/js/slick.min.js'), true );

    wp_enqueue_script( 'colonialsurety-fancybox', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array(), filemtime(get_stylesheet_directory() . '/js/jquery.fancybox.pack.js'), true );

    wp_enqueue_script( 'colonialsurety-selectric', get_template_directory_uri() . '/js/vendors/jquery.selectric.js', array('jquery'), filemtime(get_stylesheet_directory() . '/js/vendors/jquery.selectric.js'), true );

    wp_enqueue_script( 'colonialsurety-cleave', get_template_directory_uri() . '/js/vendors/cleave.min.js', array(), filemtime(get_stylesheet_directory() . '/js/vendors/cleave.min.js'), true );

    wp_enqueue_script( 'colonialsurety-moment', get_template_directory_uri() . '/js/vendors/moment.min.js', array(), filemtime(get_stylesheet_directory() . '/js/vendors/moment.min.js'), true );



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    
    /* Add map JS only to pages with map */
    $add_js = false;
    while(have_rows('widgets')) {
        the_row();
        if(get_row_layout() == 'linked_map' || get_row_layout() == 'bond_classification_dropdown') {
            $add_js = true;
        }
    }
    
    if(!$add_js) {
        while(have_rows('widgets_bottom')) {
            the_row();
            if(get_row_layout() == 'linked_map' || get_row_layout() == 'bond_classification_dropdown') {
                $add_js = true;
            }
        }
    }
    if($add_js) {
        wp_enqueue_script('tmpl.min', get_template_directory_uri() . '/js/vendors/tmpl.min.js', array(), filemtime(get_stylesheet_directory() . '/js/vendors/tmpl.min.js'), true );
        wp_enqueue_script('svg.min', get_template_directory_uri() . '/js/vendors/svg.min.js', array(), filemtime(get_stylesheet_directory() . '/js/vendors/svg.min.js'), true );
        wp_enqueue_script('linked-map', get_template_directory_uri() . '/js/linked-map.js', array(), filemtime(get_stylesheet_directory() . '/js/linked-map.js'), true );
    }
}
add_action( 'wp_enqueue_scripts', 'colonialsurety_scripts' );


/*
function getRootCategory($cat){
    //return explode('/', get_category_parents($cat))[0];
    $ancestors = get_ancestors($cat->term_id, 'category');
    if ( count($ancestors) == 0 ):
        return $cat;
    endif;
    return get_category($ancestors[count($ancestors) - 1]);
}

function getCurrentRootCategory(){
    global $cat;
    return getRootCategory(get_category($cat));
}
*/

function isBlog(){
    /*
    global $cat;
    $category = get_category($cat);
    $blog = get_category_by_slug('blog');
    return ( $blog->term_id == $category->term_id || cat_is_ancestor_of( $blog, $category ) );
    */
    //return ( is_home() || is_category() || is_date() || (get_post_type() == 'post' && !is_search()) );
    return ( is_home() || is_category() || is_date() || is_tag() );
}
function is_blog() {
    return isBlog();
}

function isJobs(){
    /*
    global $cat;
    $category = get_category($cat);
    $jobs = get_category_by_slug('jobs');
    return ( $jobs->term_id == $category->term_id || cat_is_ancestor_of( $jobs, $category ) );
    */

    //return (is_post_type_archive('job') || is_tax() || get_post_type() == 'job');// || is_page('jobs'));
    return (is_post_type_archive('job') || is_tax() );// || is_page('jobs'));
}

class Menu_With_Description extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        if($item->object == 'nav_menu_banner') {
            global $nav_menu_banner;
            ob_start();
            include get_template_directory() . '/template-parts/nav-menu/banner.php';
            $nav_menu_banner = ob_get_clean();
            return ;
        }

        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        if($item->is_mega) {
            $classes[] = 'mega-menu';
        }

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        if ($item->description){
            $item_output .= '<div class="description">' . apply_filters('the_content', $item->description) . '</div>';
        }
        $item_output .= $args->after;

        if($item->is_mega) {
            global $is_mega_menu_item;
            $is_mega_menu_item = true;
        }

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        global $is_mega_menu_item;
        $indent = str_repeat("\t", $depth);
        if ($depth == 0 && $is_mega_menu_item) {
            $output .= "\n$indent<div class='sub-menu-wrap j-sub-menu-wrap'><ul class='sub-menu'>\n";
        }
        else{
            $output .= "\n$indent<ul class='sub-menu j-sub-menu'>\n";
        }
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        global $is_mega_menu_item;
        global $nav_menu_banner;
        global $is_nav_menu_banner_dropdown;

        $indent = str_repeat("\t", $depth);
        if($is_nav_menu_banner_dropdown) {
            $indent .= "<li>{$nav_menu_banner}</li>";
            $is_nav_menu_banner_dropdown = null;
            $nav_menu_banner = null;
        }
        if ($depth == 0 && $is_mega_menu_item) {
            $output .= "$indent</ul></div>\n";
        } else{
            $output .= "$indent</ul>\n";
        }
        $is_mega_menu_item = false;
        
        
        if(!empty($nav_menu_banner)) {
            $output .= $nav_menu_banner;
            $nav_menu_banner = null;
        }
    }
}

class Walker_Nav_Menu_Dropdown extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = array()){
        $indent = str_repeat("\t", $depth); // don't output children opening tag (`<ul>`)
    }
    function end_lvl(&$output, $depth = 0, $args = array()){
        $indent = str_repeat("\t", $depth); // don't output children closing tag
    }
    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array $args    Additional strings.
     * @return void
     */
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $url = '#' !== $item->url ? $item->url : '';
        $output .= '<option value="' . $url . '">' . $item->title;
    }
    function end_el(&$output, $item, $depth = 0, $args = array()){
        $output .= "</option>\n"; // replace closing </li> with the option tag
    }
}

/**
 * Cuastom Menu Options
 */
require get_template_directory() . '/inc/custom-menu-options.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom Fields.
 */
require get_template_directory() . '/custom-fields/init.php';

/**
 * Disable Fields for Marketing Pages
 */
add_action('acf/input/admin_footer', 'marketing_pages_admin_footer', 99);
function marketing_pages_admin_footer() {
    global $post;
    if(empty($post) || get_page_template_slug($post->ID) != 'templates/marketing-landing.php') {
        return false;
    }
    echo "
    <style type=\"text/css\">
        #postdivrich {display: none;}
        #postimagediv, #screen-meta label[for=postimagediv-hide] {display: none;}
        #revisionsdiv, #screen-meta label[for=revisionsdiv-hide] {display: none;}
        #acf-group_58aef07990b0b {display: block !important;}
        .acf-postbox {display: none;}
    </style>
    ";
}

/**
 * Add Order to Team Grig
 */
add_filter('manage_posts_columns', 'advanced_team_columns_head', 10, 2);
add_action('manage_pages_custom_column', 'advanced_team_columns_content', 10, 2);
function advanced_team_columns_head($defaults, $post_type) {
    if($post_type != 'team') {
        return $defaults;
    }
    $defaults['menu_order'] = 'Order';
    return $defaults;
}
function advanced_team_columns_content($column_name, $post_ID) {
    echo get_post_field($column_name, $post_ID);
}

/**
 * Exclude Landing Pages From Search
 */
function landing_search_filter($query) {
    if(is_admin()) {
        return $query;
    }
    $pages = get_pages(array(
        'meta_key'   => '_wp_page_template',
        'meta_value' => 'templates/marketing-landing.php'
    ));
    $excludeIds = array();
    foreach($pages as $page){
        $excludeIds[] = $page->ID;
    }

    if ($query->is_search && !empty($excludeIds)) {
        $query->set('post__not_in', $excludeIds);
    }
    return $query;
}
add_filter('pre_get_posts','landing_search_filter');

/**
 * Choose which GTM to load based on ENV
 */
function choose_gtm_tag($env) {
    if (isset($_ENV['PANTHEON_ENVIRONMENT'])){
        switch ($env) {
            case "dev":
                echo "
                <!-- Fake GA sent to set up Optimize -->
                <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        
                ga('create', 'UA-44950695-3', 'auto', {allowLinker: true});
                ga('require', 'GTM-5379TRG');
        
                </script>
                <!-- End Fake GA sent to set up Optimize -->
                <!-- Google Tag Manager -->
                <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl+ '&gtm_auth=GP3TjkbeIra3qbYdAP9C4A&gtm_preview=env-33&gtm_cookies_win=x';f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','GTM-N786FVT');</script>
                <!-- End Google Tag Manager -->
                ";
            break;
            case "qa":
                echo "
                <!-- Fake GA sent to set up Optimize -->
                <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        
                ga('create', 'UA-44950695-3', 'auto', {allowLinker: true});
                ga('require', 'GTM-5379TRG');
        
                </script>
                <!-- End Fake GA sent to set up Optimize -->
                <!-- Google Tag Manager -->
                <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl+ '&gtm_auth=GP3TjkbeIra3qbYdAP9C4A&gtm_preview=env-33&gtm_cookies_win=x';f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','GTM-N786FVT');</script>
                <!-- End Google Tag Manager -->
                ";
            break;
            case "test":
                echo "
                <!-- Fake GA sent to set up Optimize -->
                <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        
                ga('create', 'UA-44950695-5', 'auto', {allowLinker: true});
                ga('require', 'GTM-P7L3W4T');
        
                </script>
                <!-- End Fake GA sent to set up Optimize -->
                <!-- Google Tag Manager -->
                <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl+ '&gtm_auth=o_JP1hsExOH7yyuPcJcq6Q&gtm_preview=env-34&gtm_cookies_win=x';f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','GTM-N786FVT');</script>
                <!-- End Google Tag Manager -->
                ";
            break;
            case "uat":
                echo "
                <!-- Fake GA sent to set up Optimize -->
                <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        
                ga('create', 'UA-44950695-5', 'auto', {allowLinker: true});
                ga('require', 'GTM-P7L3W4T');
        
                </script>
                <!-- End Fake GA sent to set up Optimize -->
                <!-- Google Tag Manager -->
                <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl+ '&gtm_auth=o_JP1hsExOH7yyuPcJcq6Q&gtm_preview=env-34&gtm_cookies_win=x';f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','GTM-N786FVT');</script>
                <!-- End Google Tag Manager -->
                ";
            break;
            case "live":
                echo "
                <!-- Google Optimize page-hiding snippet  -->
                <style>.async-hide { opacity: 0 !important} </style>
                <script>(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;
                h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
                (a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;
                })(window,document.documentElement,'async-hide','dataLayer',4000,
                {'GTM-P3XK77B':true});
                </script>
                <!-- Fake GA sent to set up Optimize -->
                <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        
                ga('create', 'UA-44950695-1', 'auto', {allowLinker: true});
                ga('require', 'GTM-P3XK77B');
        
                </script>
                <!-- End Fake GA sent to set up Optimize -->
                <!-- Google Tag Manager -->
                <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl+ '&gtm_auth=ZGU4ek-m-4fVNr1TCLNE6w&gtm_preview=env-2&gtm_cookies_win=x';f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','GTM-N786FVT');</script>
                <!-- End Google Tag Manager -->
                ";
            break;
            default:
                echo "";
            break;
        };
    } else {
        return;
    }

}


/**
 * Choose which GTM to load based on ENV
 */
function choose_gtm_noscript($env) {
    if (isset($_ENV['PANTHEON_ENVIRONMENT'])){
        switch ($env) {
            case "dev":
                echo "
                <!-- Google Tag Manager (noscript) -->
                <noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-N786FVT&gtm_auth=GP3TjkbeIra3qbYdAP9C4A&gtm_preview=env-33&gtm_cookies_win=x\"
                height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
                <!-- End Google Tag Manager (noscript) -->
                ";
            break;
            case "qa":
                echo "
                <!-- Google Tag Manager (noscript) -->
                <noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-N786FVT&gtm_auth=GP3TjkbeIra3qbYdAP9C4A&gtm_preview=env-33&gtm_cookies_win=x\"
                height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
                <!-- End Google Tag Manager (noscript) -->
                ";
            break;
            case "test":
                echo "
                <!-- Google Tag Manager (noscript) -->
                <noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-N786FVT&gtm_auth=o_JP1hsExOH7yyuPcJcq6Q&gtm_preview=env-34&gtm_cookies_win=x\"
                height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
                <!-- End Google Tag Manager (noscript) -->
                ";
            break;
            case "uat":
                echo "
                <!-- Google Tag Manager (noscript) -->
                <noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-N786FVT&gtm_auth=o_JP1hsExOH7yyuPcJcq6Q&gtm_preview=env-34&gtm_cookies_win=x\"
                height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
                <!-- End Google Tag Manager (noscript) -->
                ";
            break;   
            case "live":
                echo "
                <!-- Google Tag Manager (noscript) -->
                <noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-N786FVT&gtm_auth=ZGU4ek-m-4fVNr1TCLNE6w&gtm_preview=env-2&gtm_cookies_win=x\"
                height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
                <!-- End Google Tag Manager (noscript) -->
                ";
            break;
            default:
                echo "";
            break;
        };
    } else {
        return;
    }

}

function dump($arr) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
    if(!is_admin()) return;
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');


// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
    if(!is_admin()) return;
    // Define the style_formats array
    $style_formats = array(  
        // Each array child is a format with it's own settings
        array(  
            'title' => 'Link - Button',  
            'selector' => 'a',  
            'classes' => 'button'             
        ),
        array(  
            'title' => 'List - Two Columns',  
            'selector' => 'ul',  
            'classes' => 'list list--split'             
        ),
        array(  
            'title' => 'List - Small',  
            'selector' => 'ol',  
            'classes' => 'list list--small'             
        ),
        array(  
            'title' => 'List - Checked',  
            'selector' => 'ul',  
            'classes' => 'list list--checked'             
        )
    );  
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  

    return $init_array;  

} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

// Add editor stylesheet
add_editor_style( 'editor-styles.css' );


function insert_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts( array(
        'widget' => '',
        'id' => false,
        'form' => false,
        'cta' => false,
        'contract-amount' => false,
        'contract-percentage' => false,
        'quote-amount' => false
    ), $atts );

    // // Make sure it's one of the ones we want
    if(! in_array($atts['widget'],['cyber-promo','erisa-packages','ordered-callout','tpa-slider','tpa-referral','quote-calculator','quote','contact-form','quote-app-form-info'])) return '';

    ob_start();
    include("templates/inserts/widget-{$atts['widget']}.php");
    return preg_replace('~>\s+<~', '><', ob_get_clean());
}
add_shortcode( 'insert', 'insert_shortcode' );

function ordered_callout_shortcode($atts, $content = null) {
    ob_start();
    include("templates/partials/ordered-callout-list.php");
    return ob_get_clean();
}
add_shortcode( 'ordered-callout', 'ordered_callout_shortcode' );

function ordered_callout_item_shortcode($atts, $content = null) {
    ob_start();
    include("templates/partials/ordered-callout-item.php");
    return ob_get_clean();
}
add_shortcode( 'ordered-callout-item', 'ordered_callout_item_shortcode' );

function ordered_callout_cta_shortcode($atts, $content = null) {
    ob_start();
    include("templates/partials/ordered-callout-cta.php");
    return ob_get_clean();
}
add_shortcode( 'ordered-callout-cta', 'ordered_callout_cta_shortcode' );

function cta_shortcode($atts, $content = null) {
    return "<div class='text-cta'>$content</div>";
}
add_shortcode( 'cta', 'cta_shortcode' );

function colonial_wrap_embeds( $html, $url, $attr, $post_id ) {
    if( strpos( $html, 'youtu.be' ) !== false || strpos( $html, 'youtube.com' ) !== false ) {
        return '<div class="responsive-video">' . preg_replace( '@embed/([^"&]*)@', 'embed/$1&modestbranding=1&rel=0', $html ) . '</div>';
    }
    return $html;
}
add_filter( 'embed_oembed_html', 'colonial_wrap_embeds', 10, 4 );

function trim_editor_content($content) {
    return preg_replace("/<p[^>]*><\\/p[^>]*>/",'',preg_replace('/^(<br\s*\/?>)*|(<br\s*\/?>)*$/i', '', $content));
}

function get_product_listing( $categories = false, $id = null ) {
    $products = [];
    if($categories === false) {
        $categories = get_field('product_categories',$id);
        if( !$categories ){ return $products; }
    }

    $args = array(
        'post_type' => 'product',
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => -1,
        'hide_empty' => true
    );
    if( ! empty($categories) ) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'product_category',
                'field'=> 'term_id',
                'terms' => $categories,
                'include_children' => true
            ]
            ];
    }
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $products[] = [
                'title' => get_the_title(),
                'link' => get_field('product_link')
            ];
        }
        wp_reset_postdata();
    }
    return $products;
}

function get_site_navigation() {
    return buildTree(wp_get_nav_menu_items('primary-menu'),'menu_item_parent','ID');
}

function buildTree($flat, $pidKey, $idKey = null)
{
    $grouped = [];
    foreach ($flat as $sub){
        $grouped[$sub->{$pidKey}][] = $sub;
    }

    $fnBuilder = function($siblings) use (&$fnBuilder, $grouped, $idKey) {
        foreach ($siblings as $k => $sibling) {
            $id = $sibling->{$idKey};
            if(isset($grouped[$id])) {
                $sibling->children = $fnBuilder($grouped[$id]);
            }
            $siblings[$k] = $sibling;
        }

        return $siblings;
    };

    return $fnBuilder($grouped[0]);
}



function checklist_args( $args ) {
    $args['checked_ontop'] = false;
    return $args;
}
add_filter('wp_terms_checklist_args','checklist_args');


 function my_custom_admin_scripts() {
    wp_register_script('admin-js', get_template_directory_uri() . '/js/admin.js', 'jquery', false, true );
    wp_enqueue_script('admin-js');
}
add_action( 'admin_enqueue_scripts', 'my_custom_admin_scripts' );


function get_primary_category($postID = false) {
    $category = false;
    $postID = ! $postID ? get_the_id() : $postID;
    $term_list = wp_get_post_terms($postID, 'category', ['fields' => 'all']);
    foreach($term_list as $term) {
        if( get_post_meta($postID, '_yoast_wpseo_primary_category',true) == $term->term_id ) {
            $category = $term;
        }
    }
    return $category;
}

function is_blog_search() {
    return isset($_GET['searchType']) && $_GET['searchType'] === 'blog';
}

function update_search_query($query) {
    if(is_admin()) {
        return $query;
    }
    
    if ( is_blog_search() && $query->is_main_query() ){
        $query->set( 'post_type', 'post' );
    }

    return $query;
}
add_action( 'pre_get_posts', 'update_search_query' );

function postsperpage($limits) {
    global $wp_query;
	if (is_search() && ! is_blog_search() && $wp_query->is_main_query()) {
        $wp_query->query_vars['posts_per_page'] = 9;
	}
	return $limits;
}
add_filter('post_limits', 'postsperpage');

add_filter('relevanssi_content_to_index', 'add_custom_fields_to_relevanssi', 10, 2);
function add_custom_fields_to_relevanssi( $content, $post) {
    $plugin_fields = relevanssi_get_custom_fields();
    $add_fields = [
        'email',
        'position',
        'telephone',
        'marquee_header',
        'marquee_subtext',
        'content_widgets_%_category_listing_widget_%_category_listing_%_category_listing_heading',
        'content_widgets_%_category_listing_widget_%_category_listing_%_category_listing_description',
        'content_widgets_%_rollups_widget_%_rollups_items_%_rollup_heading',
        'content_widgets_%_rollups_widget_%_rollups_items_%_rollup_subheading',
        'content_widgets_%_rollups_widget_%_rollups_items_%_rollup_content',
    ];
    $custom_fields = $plugin_fields ? array_replace($plugin_fields,$add_fields) : $add_fields;
    foreach ( $custom_fields as $custom_field ) {
        if ( false === strpos( $custom_field, '%' ) ) :
            $content .= ' ' . get_field($custom_field,$post->ID);
        else:
            $fields = explode('_%_',$custom_field);
            $parentField = array_shift($fields);
            $fieldData = get_field($parentField,$post->ID);
            $content .= ' ' . get_repeater_content($fields,$fieldData);
        endif;
    }
    return $content;
}
function get_repeater_content($fields,$fieldData) {
    // If it's an array, we'll have to dig a little deeper depending on what
    // type of array, its content format, and the key we're looking for
    if( is_array($fieldData) ):
        $parentField = array_shift($fields);
        // If acf_fc_layout is set, this is a flexible content block, make sure
        // the key exists. If it does not, we don't want to index any of this field data.
        if(isset($fieldData['acf_fc_layout']) && !isset($fieldData[$parentField])) {
            return false;
        }
        // If there is a key and it's set in this array, let's dive back in recursively
        if($parentField && isset($fieldData[$parentField])) :
            // dump('Index Found');
            return get_repeater_content($fields,$fieldData[$parentField]);
        // We have a good old fashion indexed array, and the key we need to pull
        // is probably buried underneath that
        else:
            // Add our key back into our fields array, so we can dive deeper
            if($parentField):
                array_unshift($fields,$parentField);
            endif;

            // Loop through the array and add the content from each item
            $content = '';
            foreach($fieldData as $field):
                $content .= ' ' . get_repeater_content($fields,$field);
            endforeach;
            return $content;
        endif;
    // We have a string, this is the data we're looking for
    else:
        return $fieldData;
    endif;
}

add_filter('relevanssi_excerpt_content', 'custom_fields_to_excerpts', 10, 3);
function custom_fields_to_excerpts($content, $post, $query) {
    return add_custom_fields_to_relevanssi($content, $post);
}

function is_article_full_width() {
    global $post;
    $fullWidthTemplates = [
        'templates/tpa-page.php'
    ];
    return in_array(get_page_template_slug($post->ID),$fullWidthTemplates);
}

function get_form($form,$formID) {
    $filename = basename($form); // Make sure we get only a single file, no subfolders or directory traversing allowed
    $path     = get_template_directory() . "/templates/forms/{$filename}.php";

    if(!$form || !$formID || !file_exists($path)) return 'No valid form found.';

    $nonce = wpcf7_create_nonce($formID);
    ob_start();
    include($path);
    return ob_get_clean();
}

function update_content($content){
    global $post;
    // If this is a page using the default template (template not set), don't do any of this
    if((is_page() && empty(get_page_template_slug($post->ID))) || empty(trim($content))){ return $content; }

    $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
    $document = new DOMDocument();
    libxml_use_internal_errors(true);
    $document->loadHTML(utf8_decode($content));

    $lists = $document->getElementsByTagName('ol');
    foreach ($lists as $list) {
        $existing_class = $list->getAttribute('class');
        $list->setAttribute('class', "list list--ordered $existing_class");
    }

    $lists = $document->getElementsByTagName('ul');
    foreach ($lists as $list) {
        $existing_class = $list->getAttribute('class');
        $list->setAttribute('class', "list list--unordered $existing_class");
    }

    $links = $document->getElementsByTagName('a');
    foreach ($links as $link) {
        $existing_class = $link->getAttribute('class');
        if(strpos($existing_class,'button') === false) {
            $link->setAttribute('class', "link $existing_class");
        }
    }

    $html = $document->saveHTML();

    return trim($html);
}

// Make do shortcode last
remove_filter('the_content','do_shortcode',11);
remove_filter('the_content','wpautop');

add_filter('the_content', 'wpautop' , 12);
add_filter('the_content','do_content',90);
add_filter('the_content','do_shortcode',99);

function do_content($content) {
    return update_content($content);
}

function to_json_string($string) {
    return json_encode(iconv('utf-8', 'ascii//TRANSLIT', wp_strip_all_tags($string,true)));
}

function schema_data() {
    $orgSchema = '{
        "@context": "http://schema.org",
        "@type": "Organization",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Woodcliff Lake, NJ",
            "postalCode": "07677",
            "streetAddress": "123 Tice Boulevard"
        },
        "email": "info(at)colonialsurety.com",
        "name": "Colonial Surety",
        "telephone": "800-221-3662",
        "logo": {
            "@type": "ImageObject",
            "url": "https://www.colonialsurety.com/wp-content/uploads/2019/05/colonial-logo.png"
        }
    }';
    if(is_singular('job') || is_singular('career')){
        return include(get_template_directory() . '/schema/job.php');
    } else if(is_singular('post')){
        return include(get_template_directory() . '/schema/post.php');
    }
    return;
}
add_action( 'wp_head', 'schema_data' );


function redirect_erisa() {

     $url = parse_url($_SERVER['REQUEST_URI']);
     if(rtrim($url['path'],'/') === '/erisa') {
         $refCode = ! empty($_GET['ref']) ? "?ref={$_GET['ref']}" : '';
         exit( wp_redirect( "/fidelity-bonds/erisa-bonds/$refCode" ) );
     }
}
add_action( 'init', 'redirect_erisa' );

// offset scroll formidable forms
add_filter('frm_scroll_offset', 'frm_scroll_offset');
function frm_scroll_offset(){
  return 170; //adjust this as needed
}

// not allow future dates in date field - formidable
add_action('frm_date_field_js', 'limit_my_date_field');
function limit_my_date_field($field_id){
  if($field_id == 'field_z0uoe' || $field_id == 'field_tkpd2'){ //change FIELDKEY to the key of your date field
    echo ',minDate:-3600,maxDate:0';
  }
}