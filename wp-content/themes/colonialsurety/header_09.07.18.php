<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package colonialsurety
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Cabin:400,500,' rel='stylesheet' type='text/css'>

<link rel="icon" href="<?php echo get_template_directory_uri() . '/images/favicon.png'?>" sizes="16x16" />

    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "4a9b3ab6-f218-4b77-9289-9d51cc5ef7dd", doNotHash: false, doNotCopy: false, hashAddressBar: false, onhover:false});</script>

<?php wp_head(); ?>
<?php
    if (is_singular('job')) {
        ?>
        <?php if($linkedin_api_key = get_field('linkedin_api_key', 'options')) : ?>
        <script type="text/javascript" src="//platform.linkedin.com/in.js">
            api_key: <?php echo $linkedin_api_key . PHP_EOL; ?>
            onLoad: onLinkedInLoad
        </script>
        <?php endif; ?>
        <script type="text/javascript">
            // Setup an event listener to make an API call once auth is complete
            function onLinkedInLoad() {
                IN.Event.on(IN, "auth", getProfileData);
            }

            // Handle the successful return from the API call
            function onSuccess(data) {
                jQuery('.contact.widget.block').addClass('open')
                jQuery('.apply-linkedin').remove()
                jQuery('.apply-now').remove()

                jQuery('input[name=first_name]').val(data.firstName)
                jQuery('input[name=last_name]').val(data.lastName)
                jQuery('input[name=email]').val(data.emailAddress)

                var monthNames = ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];
                var text = 'Public Linkedin Profile: ' + data.publicProfileUrl + '\n\n'
                text += 'Experience\n=========================\n'
                jQuery(data.positions.values).each(function(i,e){
                    text += e.company.name + '\n'
                    text += e.title + '\n'
                    text += monthNames[e.startDate.month - 1] + ', ' + e.startDate.year + '\n'
                    if (!jQuery.isEmptyObject(e.location))
                        text += e.location.name
                    text += '\n\n'
                })
                jQuery('textarea').val(text)
            }

            // Handle an error response from the API call
            function onError(error) {
                console.log(error);
            }

            // Use the API call wrapper to request the member's profile data
            function getProfileData() {
                IN.API.Raw("/people/~:(last-name,first-name,email-address,specialties,positions,summary,public-profile-url)")
                    //IN.API.Raw("/people::(~):(first-name,last-name,formatted-name,headline,summary,specialties,associations,interests,picture-url,public-profile-url,email-address,location:(name),date-of-birth,three-current-positions:(title,company,summary,start-date,end-date,is-current),three-past-positions:(title,company,summary,start-date,end-date,is-current),positions:(title,company,summary,start-date,end-date,is-current),educations:(school-name,degree,field-of-study,start-date,end-date,activities,notes),skills:(skill),phone-numbers,primary-twitter-account)")
                    //https://api.linkedin.com/v1/people::(~):(first-name,last-name,formatted-name,headline,summary,specialties,associations,interests,picture-url,public-profile-url,email-address,location:(name),date-of-birth,three-current-positions:(title,company,summary,start-date,end-date,is-current),three-past-positions:(title,company,summary,start-date,end-date,is-current),positions:(title,company,summary,start-date,end-date,is-current),educations:(school-name,degree,field-of-study,start-date,end-date,activities,notes),skills:(skill),phone-numbers,primary-twitter-account)
                    .result(onSuccess).error(onError);
            }

            jQuery(document).ready(function(){
                jQuery('.apply-now').click(function(e){
                    e.preventDefault()
                    jQuery('.contact.widget.block').addClass('open')

                    jQuery('.apply-now').remove()
                })

                jQuery('.apply-linkedin').click(function(e){
                    e.preventDefault()
                    IN.User.authorize(function(){
                        onLinkedInLoad();
                    });
                })
            })
        </script>
    <?php
    }
?>
<?php echo get_field('google_analytics', 'options', false, false); ?>
<?php
if(is_page_template('templates/marketing-landing.php')) : 
    echo get_field('landing_pages_header_script', 'options', false, false);
endif;
?>
</head>

<body <?php body_class(); ?>>
<?php echo get_field('google_tag_manager_no_script', 'options', false, false); ?>
<div id="page" class="site">
<?php if(is_page_template('templates/marketing-landing.php')) : ?>
    <?php get_template_part('template-parts/marketing-landing/header'); ?>
<?php else : ?>
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'colonialsurety' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
        <nav id="top-navigation" class="top-navigation" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'top', 'menu_id' => 'top-menu', 'container_class' => 'wrapper' ) ); ?>
        </nav>
        <div class="wrapper">
            <div class="site-branding">
                <?php
                if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri() . '/images/logo.jpg'; ?>" alt="<?php echo bloginfo( 'name' ); ?>" title="<?php echo bloginfo( 'name' ); ?>" /></a></h1>
                <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri() . '/images/logo.jpg'; ?>" alt="<?php echo bloginfo( 'name' ); ?>" title="<?php echo bloginfo( 'name' ); ?>" /></a></p>
                <?php
                endif; ?>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation" role="navigation">
                <?php /* <button class="search-toggle"><span><?php esc_html_e( 'Search', 'colonialsurety' ); ?></span></button>*/ ?>
                <button id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span><?php esc_html_e( 'Primary Menu', 'colonialsurety' ); ?></span></button>
                <?php $walker = new Menu_With_Description; ?>
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'items_wrap'=>'<ul id="%1$s" class="%2$s">%3$s</ul>', 'walker' => $walker  ) ); ?>
                <?php //get_search_form()?>
            </nav><!-- #site-navigation -->
        </div>
	</header><!-- #masthead -->
<?php endif; ?>
<?php
if (is_category($cat))
    $widgets = get_field('widgets', $cat);
else
    $widgets = get_field('widgets');
?>
	<div id="content" class="site-content<?php echo (!is_array($widgets) || count($widgets)==0 ? ' no-widgets' : '' )?>">
