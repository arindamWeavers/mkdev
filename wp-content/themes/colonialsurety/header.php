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
    <meta name="msvalidate.01" content="E82E2DF59A4D698C4CA41BD6FE7C4DD6" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,|IBM+Plex+Sans:400,400i,600,600i,700,700i|Raleway:300,400,500,600,700" rel="stylesheet">
    <link rel="icon" href="<?php echo get_template_directory_uri() . '/images/favicon.png'?>" sizes="16x16" />
    <script type="text/javascript">var switchTo5x=true;</script>
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

<?php
if(is_page_template('templates/marketing-landing.php')) : 
    echo get_field('landing_pages_header_script', 'options', false, false);
endif;
?>
</head>

<?php choose_gtm_tag(PANTH_ENV);?>

<body <?php body_class(); ?>>

<?php choose_gtm_noscript(PANTH_ENV);?>

<div id="page" class="site">
<?php if(is_page_template('templates/marketing-landing.php')) : ?>
    <?php get_template_part('template-parts/marketing-landing/header'); ?>
<?php else : ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to main content', 'colonialsurety' ); ?></a>
    <div id="announcer" class="sr-only" data-live="polite" role="alert"></div>
	<header id="masthead" class="main-header" role="banner">
        <?php $active_service_announcement = get_field('activate_service_announcement','options'); ?>
        <?php 
            $serviceCookie = isset($_COOKIE['wordpress_serviceAnnouncement']) 
                ? json_decode(wp_unslash($_COOKIE['wordpress_serviceAnnouncement']))
                : [];
        ?>
        <?php $serviceID = get_field('service_announcement_id','options'); ?>
        <?php if($active_service_announcement && ! isset($serviceCookie->$serviceID)) : ?>
        <div class="service-announcement" role="alert" data-service-announcement-id="<?php echo $serviceID ?>">
            <div class="service-announcement__wrapper wrapper">
                <button class="service-announcement__close" aria-label="Close alert">
                    <span class="sr-only">Close</span>
                    <span class="service-announcement__close-txt">×</span>
                </button>
                <?php $announcement_header = get_field('service_announcement_header','options'); ?>
                <?php if($announcement_header) : ?>
                <div class="service-announcement__header"><?php echo $announcement_header; ?></div>
                <?php endif; ?>
                <div class="service-announcement__content"><?php echo get_field('service_announcement_content','options'); ?></div>
            </div>
        </div>
        <?php endif; ?>
        <nav id="top-navigation" class="top-navigation" role="navigation" aria-label="Top Navigation">
            <?php 
                // DigaTech (or whatever it was) got removed, so now the phone number needs to be dynamic
                // I needed a fast fix, so I just copied the output and put it in manually. This means no matter what
                // you put in the admin for this menu, it won't show up
                // wp_nav_menu( array( 'theme_location' => 'top', 'menu_id' => 'top-menu', 'container_class' => 'wrapper' ) ); 

                // New stuff
                $globalPhoneNum = get_field('global_phone_number') ?: '800-221-3662';
            ?>
            <div class="wrapper"><ul id="top-menu" class="menu"><li id="menu-item-11" class="tel sep menu-item menu-item-type-custom menu-item-object-custom menu-item-11"><a href="tel:<?php echo preg_replace('/[\.\-]/','',$globalPhoneNum); ?>"><?php echo $globalPhoneNum; ?></a></li>
            <li id="menu-item-1825" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1825"><a href="/report-a-claim/">Report a Claim</a></li>
            <li id="menu-item-12" class="calculate blue menu-item menu-item-type-custom menu-item-object-custom menu-item-12" aria-haspopup="true"><a target="_blank" href="https://colonial-surety.lndo.site/login/" id="top-nav-login" aria-expanded="false">Login</a></li>
            </ul></div>
            <div class="wrapper top-navigation__login-wrapper">
                <div class="top-navigation__login" role="menu" aria-label="Login Menu">
                    <a href="https://quote.colonialsurety.com/quote" class="top-navigation__login-link" role="menuitem">Surety, Court, License &amp; Permit Bonds, Insurance Products</a>
                    <a href="https://quote.colonialsurety.com/" class="top-navigation__login-link" role="menuitem">ERISA Bonds, Fiduciary &amp; Cyber Liability Insurance, Pension Professional Products, Contract Surety, Bid Bonds</a>
                </div>
            </div>
        </nav>
        <div class="main-header__content">
            <div class="main-header__content-wrapper wrapper">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="main-header__logo-link">
                    <img src="<?php echo get_template_directory_uri() . '/images/colonial-logo.svg'; ?>" alt="<?php echo bloginfo( 'name' ); ?>" title="<?php echo bloginfo( 'name' ); ?>" class="main-header__logo"/>
                </a>
                <?php include('templates/site-navigation.php'); ?>
                <div class="main-header__actions" aria-haspopup="true" role="menu" aria-label="Main navigation actions">
                    <button class="main-header__search-btn" aria-expanded="false" aria-controls="menu-search" tabindex="-1" role="menuitem">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M23.635 21.86l-5.916-5.94a9.46 9.46 0 0 0 2.354-6.23c0-5.343-4.502-9.69-10.036-9.69S0 4.347 0 9.69c0 5.343 4.503 9.69 10.037 9.69 2.077 0 4.057-.605 5.75-1.753l5.961 5.985c.25.25.585.388.944.388.34 0 .662-.125.907-.353.52-.483.537-1.284.036-1.787zM10.037 2.528c4.09 0 7.418 3.213 7.418 7.162 0 3.95-3.328 7.162-7.418 7.162S2.618 13.64 2.618 9.69c0-3.95 3.328-7.162 7.419-7.162z"/>
                        </svg>
                        <span class="sr-only"><?php esc_html_e( 'Search', 'colonialsurety' ); ?></span>
                    </button>
                    <button id="menu-toggle" class="main-header__menu-btn" aria-controls="primary-menu" aria-expanded="false" role="menuitem">
                        <div class="main-header__menu-bar"></div>
                        <div class="main-header__menu-bar"></div>
                        <div class="main-header__menu-bar"></div>
                        <span class="sr-only"><?php esc_html_e( 'Primary Menu', 'colonialsurety' ); ?></span>
                    </button>
                </div>
                <div class="main-header__search-form" id="menu-search">
                    <div class="main-header__search-wrapper">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
        </div>
	</header><!-- #masthead -->
<?php endif; ?>
<?php
if (is_category($cat))
    $widgets = get_field('widgets', $cat);
else
    $widgets = get_field('widgets');
?>
    <main id="content" class="site-content<?php echo (!is_array($widgets) || count($widgets)==0 ? ' no-widgets' : '' )?>" role="main" tabindex="-1">
