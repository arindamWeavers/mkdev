<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package colonialsurety
 */

if(is_blog_search())
{
  include(get_template_directory() . '/templates/search/blog.php');
}
else
{
  include(get_template_directory() . '/templates/search/global.php');
}