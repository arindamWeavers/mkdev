<?php
/**
 * Template Name: Jobs
 *
 * @package colonialsurety
 */


get_header(); ?>

<?php
//var_dump($post);
$wp_query = new WP_Query(array('post_type'=>'job'));
//var_dump($post);
?>
<?php get_template_part( 'listing', 'template' );?>

<?php
get_sidebar();
get_footer();
