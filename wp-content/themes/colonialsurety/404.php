<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package colonialsurety
 */

get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <div class="wrapper">
      <svg xmlns="http://www.w3.org/2000/svg" width="52" height="52" viewBox="0 0 52 52" class="error404__icon">
          <g fill="none" fill-rule="evenodd" stroke-width="2">
              <g stroke="#94A5AF" transform="translate(6 6)">
                  <rect width="40" height="28" rx="3"/>
                  <path stroke-linecap="round" d="M0 22h17M30 22h10"/>
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17 31v5M23 31v5M13 39h14"/>
              </g>
              <g stroke="#102938">
                  <g stroke-linecap="round">
                      <path d="M35 12l-6 6M29 12l6 6"/>
                  </g>
                  <g stroke-linecap="round">
                      <path d="M23 12l-6 6M17 12l6 6"/>
                  </g>
                  <path stroke-linecap="round" d="M17 23h18"/>
                  <path d="M27 23h5v2.5a2.5 2.5 0 1 1-5 0V23z"/>
              </g>
          </g>
      </svg>
      <h1 class="error404__heading">The page you’re looking for could not be found.</h1>
      <p class="error404__copy">Try searching or choose one of the links below.</p>
      <?php get_search_form(); ?>
      <ul class="no-results__list">
        <li class="no-results__item">
          <a href="/fidelity-bonds/erisa-bonds/" class="no-results__link">ERISA Bonds</a>
        </li>
        <li class="no-results__item">
          <a href="/surety-bonds/court-and-fiduciary-bonds/" class="no-results__link">Court &amp; Fiduciary Bonds</a>
        </li>
        <li class="no-results__item">
          <a href="/surety-bonds/license-permit/" class="no-results__link">License &amp; Permit Bonds</a>
        </li>
        <li class="no-results__item">
          <a href="/insurance/cyber-liability-insurance/" class="no-results__link">Cyber Liability Insurance</a>
        </li>
      </ul>
    </div>
  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
