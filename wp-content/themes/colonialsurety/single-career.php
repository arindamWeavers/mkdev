<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package colonialsurety
 */

get_header(); ?>
<?php $category = get_primary_category(); ?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <div class="wrapper">
        <nav class="post-breadcrumbs" aria-label="Breadcrumb">
          <ul class="post-breadcrumbs__list post-breadcrumbs__list--clean">
            <li class="post-breadcrumbs__breadcrumb"><a href="/" class="post-breadcrumbs__link">Home</a></li>
            <li class="post-breadcrumbs__breadcrumb"><a href="/about/careers/" class="post-breadcrumbs__link">Careers</a></li>
          </ul>
        </nav>
      </div>
      <div class="wrapper">
        <div class="post-header">
          <?php if($category): ?>
            <a href="<?php echo esc_attr(get_term_link($category))?>" class="post-header__category">
              <?php echo $category->name; ?>
            </a>
          <?php endif; ?>
          <h1 class="post-header__title"><?php the_title(); ?></h1>
          <span class="post-header__date"><?php echo get_field('description') ?></span>
        </div>
      </div>
      <article class="article">
        <div class="article__wrapper wrapper">
          <div class="article__main">
            <?php the_content(); ?>
            <p class="job-cta">
              <a href="#" aria-controls="JobApplication" data-trigger="modal" aria-expanded="false" class="job-cta__cta">
                <button class="button job-cta__button">Apply for this Job</button>
              </a>
            </p>
            <?php include(get_template_directory() . '/templates/modals/job-app.php'); ?>
            <?php include(get_template_directory() . '/templates/modals/job-app-submitted.php'); ?>
          </div>
          <div class="article__rail rail">
            <div class="rail__inner">
              <?php include('templates/partials/social-share.php'); ?>
              <div class="article-info">
                <h2 class="article-info__heading" id="postedDate">Posted Date</h2>
                <ul class="article-info__list" aria-labelledby="postedDate">
                  <li class="article-info__item">
                    <?php echo get_the_date('m.d.Y'); ?>
                  </li>
                </ul>
              </div>
              <?php $jobType = get_field('job_type'); ?>
              <?php if($jobType) : ?>
              <div class="article-info">
                <h2 class="article-info__heading" id="jobType">Job Type</h2>
                <ul class="article-info__list" aria-labelledby="jobType">
                  <li class="article-info__item">
                    <?php echo $jobType; ?>
                  </li>
                </ul>
              </div>
              <?php endif; ?>
              <?php $departments = get_the_terms(get_the_id(),'department'); ?>
              <?php if($departments) : ?>
              <div class="article-info">
                <h2 class="article-info__heading" id="department">Department</h2>
                <ul class="article-info__list" aria-labelledby="department">
                  <?php foreach($departments as $department): ?>
                  <li class="article-info__item">
                    <?php echo $department->name; ?>
                  </li>
                  <?php endforeach; ?>
                </ul>
              </div>
              <?php endif; ?>
              <?php $experienceLevel = get_field('experience_level'); ?>
              <?php if($experienceLevel) : ?>
              <div class="article-info">
                <h2 class="article-info__heading" id="jobExperienceLevel">Experience Level</h2>
                <ul class="article-info__list" aria-labelledby="jobExperienceLevel">
                  <li class="article-info__item">
                    <?php echo $experienceLevel; ?>
                  </li>
                </ul>
              </div>
              <?php endif; ?>
              <?php $jobLocation = get_field('location'); ?>
              <?php if($jobLocation) : ?>
              <div class="article-info">
                <h2 class="article-info__heading" id="jobLocation">Location</h2>
                <ul class="article-info__list" aria-labelledby="jobLocation">
                  <li class="article-info__item">
                    <?php echo $jobLocation; ?>
                  </li>
                </ul>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </article>
      <?php include('templates/includes/colonial-trust.php'); ?>
      <?php include('templates/includes/colonial-proud.php'); ?>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();