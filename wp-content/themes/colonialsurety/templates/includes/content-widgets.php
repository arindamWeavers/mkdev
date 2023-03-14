<?php if( have_rows('content_widgets') ): ?>
<div class="article__widgets">
  <?php $widgetIndex = 0;; ?>
  <?php while ( have_rows('content_widgets') ) : the_row(); $widgetIndex++; ?>
    <?php $widgetLayout = get_row_layout(); ?>
    <?php
      $altClass = '';
      if($widgetLayout === 'widget_text_callout') {
        $widget = get_sub_field('text_callout_widget');
        $altClass = ($widget['callout_style'] && $widget['callout_style']) !== 'standard' 
          ? " widget--$widgetLayout--{$widget['callout_style']}" 
          : '';
      } else if($widgetLayout === 'widget_ordered_callout') {
        $widget = get_sub_field('ordered_callout_widget');
        $altClass = ($widget['style'] && $widget['style']) !== 'stacked' 
          ? " widget--$widgetLayout--{$widget['style']}" 
          : '';
      }
    ?>
    <div class="widget widget--<?php echo $widgetLayout; echo $altClass; ?>">
      <?php if($includeWidgetWrapper): ?><div class="wrapper wrapper--content"><?php endif; ?>
        <?php if($widgetLayout === 'widget_rollups'): ?>
          <?php $widget = get_sub_field('rollups_widget'); ?>
          <div class="rollups <?php if($widget['rollups_alternate_style']){ echo 'rollups--bond-grouping'; } ?>">
              <?php if($widget['rollups_heading']): ?>
              <h2 class="rollups__heading"><?php echo $widget['rollups_heading']; ?></h2>
              <?php endif; ?>
              <ul class="rollups__list">
                  <?php foreach($widget['rollups_items'] as $index => $rollup): ?>
                  <li class="rollups__rollup">
                      <div class="rollups__trigger-group">
                          <button class="rollups__trigger" aria-expanded="false" aria-controls="rollup-content-<?php echo $widgetIndex; ?>-<?php echo $index; ?>"><?php echo $rollup['rollup_heading']; ?></button>
                          <?php if($widget['rollups_alternate_style'] && $rollup['rollup_subheading']): ?>
                          <div class="rollups__subheading"><?php echo $rollup['rollup_subheading']; ?></div>
                          <?php endif; ?>
                      </div>
                      <div class="rollups__content" id="rollup-content-<?php echo $widgetIndex; ?>-<?php echo $index; ?>" tabindex="-1">
                          <?php echo do_content($rollup['rollup_content']); ?>
                      </div>
                  </li>
                  <?php endforeach; ?>
              </ul>
          </div>
        <?php elseif($widgetLayout === 'widget_category_listing'): ?>
          <?php $widget = get_sub_field('category_listing_widget') ?>
          <div class="category-listing" role="complementary">
            <?php foreach($widget['category_listing'] as $index => $listing): ?>
            <div class="category-listing__item">
              <?php $icon = $listing['category_listing_icon']; ?>
              <?php if($icon): ?>
              <img src="<?php echo $listing['category_listing_icon']; ?>" alt="" class="category-listing__icon"/>
              <?php endif; ?>
              <?php $headingID = $listing['category_listing_heading_id'] ?: preg_replace("/[\W_]+/", '', ucwords($listing['category_listing_heading']));?>
              <h2 class="category-listing__heading" id="<?php echo $headingID; ?>"><?php echo $listing['category_listing_heading']; ?></h2>
              <div class="category-listing__copy"><?php echo $listing['category_listing_description']; ?></div>
              <?php $listingLinks = $listing['category_listing_links']; ?>
              <?php if($listingLinks): ?>
              <div class="category-listing__cta">
                <?php foreach($listingLinks as $linkIndex => $link): ?>
                <a href="<?php echo $link['category_listing_link_url']; ?>" class="link"><?php echo $link['category_listing_link_text']; ?></a>
                <?php endforeach; ?>
              </div>
              <?php endif; ?>
            </div>
            <?php endforeach; ?>
          </div>
        <?php elseif($widgetLayout === 'widget_editor_content'): ?>
          <?php $widget = get_sub_field('editor_content_widget'); ?>
          <div class="editor-content">
            <?php $contentSize = $widget['content_size'] ? " editor-content__content--{$widget['content_size']}" : false; ?>
            <div class="editor-content__content<?php echo $contentSize ?: ''; ?>">
              <?php echo $widget['content']; ?>
            </div>
            <?php $additionalEditorMedia = $widget['use_additional_media']; ?>
            <?php if($additionalEditorMedia): ?>
              <?php $mediaSize = $widget['media_size'] ? " editor-content__additional-media--{$widget['media_size']}" : false; ?>
              <?php $hideOnMobile = $widget['hide_on_mobile'] ? " editor-content__additional-media--hide-on-mobile" : false; ?>
              <div class="editor-content__additional-media<?php echo $mediaSize ?: ''; ?><?php echo $hideOnMobile ?: ''; ?>">
                <?php $mediaStyle = $widget['media_style']; ?>
                <?php if($mediaStyle === 'video'): ?>
                <?php $videoID = rand(50000,60000); ?>
                  <div class="editor-content__video">
                    <a href="https://www.youtube.com?watch=<?php echo $widget['video_id']; ?>" class="editor-content__video-link video-preview link link--none" aria-controls="video-<?php echo $videoID; ?>" data-trigger="modal" aria-expanded="false">
                      <img src="<?php echo $widget['video_image']; ?>" class="editor-content__cover-image video-preview__image" alt=""/>
                    </a>
                  </div>
                  <div class="modal modal--video" id="video-<?php echo $videoID; ?>" role="dialog" aria-label="Colonial Video" aria-modal="true" aria-hidden="true">
                    <div class="modal__body" data-modal-content>
                      <button class="close" data-close="modal"><span class="sr-only">Close Modal</span></button>
                      <div class="modal__responsive-video">
                        <iframe width="760" height="410" data-src="https://www.youtube.com/embed/<?php echo $widget['video_id']; ?>?rel=0&modestbranding=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen title=""></iframe>
                      </div>
                    </div>
                  </div>
                <?php elseif($mediaStyle === 'image'): ?>
                  <?php $breakContainment = $widget['break_containment'] ? " editor-content__image--break-containment" : false; ?>
                  <img src="<?php echo $widget['image']['url']; ?>" class="editor-content__image<?php echo $breakContainment ?: ''; ?>" width="<?php echo $widget['image']['width']; ?>" height="<?php echo $widget['image']['height']; ?>" alt="" />
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>
        <?php elseif($widgetLayout === 'widget_ordered_callout'): ?>
          <?php $widget = get_sub_field('ordered_callout_widget'); ?>
          
          <div class="ordered-callout <?php echo $widget['style']==='dividedStacked' ? '' : 'ordered-callout--plain'; ?>">
            <?php if($widget['background_images']): ?>
              <?php foreach($widget['background_images'] as $backgroundImage): ?>
                <img src="<?php echo $backgroundImage['image']; ?>" class="ordered-callout__bg-image" style="top:<?php echo $backgroundImage['top_position']; ?>;left:<?php echo $backgroundImage['left_position']; ?>;right:<?php echo $backgroundImage['right_position']; ?>;bottom:<?php echo $backgroundImage['bottom_position']; ?>;" alt=""/>
              <?php endforeach; ?>
            <?php endif; ?>
            <?php if(!empty($widget['heading'])): ?><h2 class="ordered-callout__heading"><?php echo $widget['heading']; ?></h2><?php endif; ?>
            <ol class="ordered-callout__list">
              <?php foreach($widget['callouts'] as $callout): ?>
                <li class="ordered-callout__item">
                  <?php if($callout['check']) : ?>
                  <div class="ordered-callout__badge ordered-callout__badge--check"></div>
                  <?php else: ?>
                  <div class="ordered-callout__badge"><?php echo $callout['badge']; ?></div>
                  <?php endif; ?>
                  <div class="ordered-callout__content-wrapper">
                    <div class="ordered-callout__item-heading"><?php echo $callout['heading']; ?></div>
                    <div class="ordered-callout__content"><?php echo do_content(wpautop($callout['content'])); ?></div>
                  </div>
                </li>
              <?php endforeach; ?>
            </ol>
            <?php if($widget['include_cta']): ?><?php echo $widget['callout_cta']; ?><?php endif; ?>
          </div>
        <?php elseif($widgetLayout === 'widget_text_callout'): ?>
          <?php $widget = get_sub_field('text_callout_widget'); ?>
          <div class="text-callout">
            <?php if(!empty($widget['heading'])): ?>
              <?php if($widget['callout_style']==='marquee'): ?>
                <h1 class="text-callout__heading"><?php echo $widget['heading']; ?></h1>
              <?php else: ?>
                <h2 class="text-callout__heading"><?php echo $widget['heading']; ?></h2>
              <?php endif; ?>
            <?php endif; ?>
            <div class="text-callout__callouts">
              <div class="text-callout__callout">
                <?php echo do_content($widget['text_callout']); ?>
              </div>
              <?php if($widget['include_side_callout']): ?>
              <div class="text-callout__callout">
                <?php echo do_content($widget['side_text_callout']); ?>
              </div>
              <?php endif; ?>
            </div>
            <?php if($widget['include_bottom_callout']): ?>
            <div class="text-callout__bottom-callout">
              <?php echo do_content($widget['bottom_callout']); ?>
            </div>
            <?php endif; ?>
          </div>
        <?php elseif($widgetLayout === 'widget_video_tiles'): ?>
          <?php $widget = get_sub_field('video_tiles_widget'); ?>
          <div class="video-tiles">
            <?php if(!empty($widget['heading'])): ?><h2 class="video-tiles__title"><?php echo $widget['heading']; ?></h2><?php endif; ?>
            <div class="video-tiles__videos">
              <?php foreach($widget['videos'] as $video): ?>
              <?php $videoID = rand(50000,60000); ?>
              <div class="video-tiles__video">
                <a href="https://www.youtube.com?watch=<?php echo $video['video_id']; ?>" class="video-tiles__image-wrapper video-preview" aria-controls="video-<?php echo $videoID; ?>" data-trigger="modal" aria-expanded="false">
                  <img src="<?php echo $video['cover_image']; ?>" class="video-tiles__cover-image video-preview__image" alt=""/>
                </a>
                <div class="video-tiles__content">
                  <div class="video-tiles__title"><?php echo $video['title']; ?></div>
                  <p class="video-tiles__description"><?php echo $video['description']; ?></p>
                  <?php if($video['include_links']): ?>
                    <div class="video-tiles__cta">
                      <?php foreach($video['links'] as $link): ?>
                      <a href="<?php echo $link['link_url']; ?>" class="link"><?php echo $link['link_text']; ?></a>
                      <?php endforeach; ?>
                    </div>
                  <?php endif; ?>
                </div>
                <div class="modal modal--video" id="video-<?php echo $videoID; ?>" role="dialog" aria-label="<?php echo $video['title']; ?>" aria-modal="true" aria-hidden="true">
                  <div class="modal__body" data-modal-content>
                    <button class="close" data-close="modal"><span class="sr-only">Close Modal</span></button>
                    <div class="modal__responsive-video">
                      <iframe width="760" height="410" data-src="https://www.youtube.com/embed/<?php echo $video['video_id']; ?>?rel=0&modestbranding=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen title="<?php echo $link['link_text']; ?> Video"></iframe>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php elseif($widgetLayout === 'widget_slider'): ?>
          <?php $widget = get_sub_field('slider_widget'); ?>
          <?php $sliderType = $widget['slider_type']; ?>
          <div class="content-slider<?php echo $sliderType ? " content-slider--$sliderType" : ''; ?>" data-slider-container data-title="colonial services">
            <div class="slider">
              <?php if($widget['randomize']){shuffle($widget['slides']);} ?>
              <?php foreach($widget['slides'] as $slide): ?>
              <div class="content-slider__slide">
                <div class="content-slider__slide-content">
                  <div class="content-slider__image-wrapper"><img src="<?php echo $slide['image']; ?>" alt="<?php echo $slide['heading']; ?>" class="content-slider__image" /></div>
                  <div class="content-slider__content">
                    <?php if($sliderType === 'quotes'): ?>
                      <div class="content-slider__quote"><?php echo $slide['quote']; ?></div>
                      <div class="content-slider__attribution">&mdash;<?php echo $slide['attribution']; ?></div>
                    <?php else: ?>
                      <h3 class="content-slider__slide-header" data-slide-heading><?php echo $slide['heading']; ?></h3>
                      <div class="content-slider__copy"><?php echo do_content($slide['content']); ?></div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php elseif($widgetLayout === 'widget_referral_link_generator'): ?>
          <?php $widget = get_sub_field('referral_link_generator_widget'); ?>
          <div class="ref-link-generator">
            <div class="ref-link-generator__controls">
              <fieldset class="ref-link-generator__fieldset">
                <legend class="sr-only">Preview sizes</legend>
                <div class="ref-link-generator__panel-label">Select Size:</div>
                <div class="radio-group">
                  <?php foreach($widget['styles'] as $index => $style): ?>
                  <div class="radio-group__radio radio">
                    <input type="radio" name="referral_style" class="radio__input" id="referralStyle<?php echo $style['style']; ?>" value="<?php echo $style['style']; ?>" <?php echo $index===0 ? 'checked' : ''; ?>/>
                    <label for="referralStyle<?php echo $style['style']; ?>" class="radio__label"><?php echo $style['style_text']; ?></label>
                    <a href="#" class="link ref-link-generator__preview-link">Preview</a>
                  </div>
                  <?php endforeach; ?>
                </div>
                <label for="referralCode" class="ref-link-generator__input-label">Enter Referral Code</label>
                <input type="text" name="referral_code" class="ref-link-generator__code-input" value="" data-default="AA9999" id="referralCode" maxlength="6" />
                <button class="button ref-link-generator__update">Update</button>
              </fieldset>
            </div>
            <div class="ref-link-generator__preview">
              <p><button class="close ref-link-generator__close-preview"><span class="sr-only">Close preview window</span></button></p>
              <div class="ref-link-generator__panel-label">Preview</div>
              <div class="ref-link-generator__preview-wrapper">
                <div class="ref-link-generator__preview-content"></div>
              </div>
            </div>
            <div class="ref-link-generator__code-panel">
              <p><button class="ref-link-generator__panel-label" data-rollup=".ref-link-generator__code" aria-controls="referralCodeToCopy" id="codePanelLabel">Code</button></p>
              <div class="ref-link-generator__code" id="referralCodeToCopy" aria-describedby="codePanelLabel">
                <div class="ref-link-generator__code-to-copy" data-dest-referral></div>
                <?php foreach($widget['styles'] as $style): ?>
                <div data-src-referral="<?php echo $style['style']; ?>" aria-hidden="true" class="sr-only">
                  <?php echo $style['code']; ?>
                </div>
                <?php endforeach; ?>
              </div>
              <button class="button button--ghost ref-link-generator__copy-code" data-copy-clipboard="[data-dest-referral]">
                <span class="button__initial">Copy to Clipboard</span>
                <span class="button__done"></span>
                <span class="sr-only" aria-live="polite" data-copy-clipboard-msg></span>
              </button>
            </div>
          </div>
        <?php elseif($widgetLayout === 'widget_career_listing'): ?>
          <?php $widget = get_sub_field('career_listing_widget'); ?>
          <div class="career-listing">
            <h2 class="career-listing__heading"><?php echo $widget['heading']; ?></h2>
            <?php if(!empty($widget['career_listing'])): ?>
              <ol class="list career-listing__list">
                <?php foreach($widget['career_listing'] as $career): $career = $career['careers']; ?>
                  <li class="career-listing__career">
                    <a href="<?php echo get_the_permalink($career->ID); ?>" class="link career-listing__career-link">
                      <h3 class="career-listing__career-title"><?php echo $career->post_title; ?></h3>
                      <?php $jobDescription = get_field('description',$career->ID); ?>
                      <?php if($jobDescription): ?>
                        <p class="career-listing__career-excerpt"><?php echo $jobDescription; ?></p>
                      <?php endif; ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ol>
            <?php else: ?>
              <div class="career-listing__no-careers">
                <?php if(empty($widget['no_careers_content'])): ?>
                  <p style="text-align:center">There are no job openings at this time. However, we always love to hear from qualified candidates. Send us your resume and we will contact you if you're an ideal fit.</p>
                  <p style="text-align:center">
                    <a href="#" aria-controls="JobApplication" data-trigger="modal" aria-expanded="false" class="link">Submit Resume</a>
                  </p>
                <?php else: ?>
                <?php echo do_content($widget['no_careers_content']); ?>
                <?php endif; ?>
                <?php include(get_template_directory() . '/templates/modals/job-app.php'); ?>
                <?php include(get_template_directory() . '/templates/modals/job-app-submitted.php'); ?>
              </div>
            <?php endif; ?>
            <?php if($widget['include_cta']): ?>
            <div class="careers-cta">
              <div class="careers-cta__image" style="background-image:url(<?php echo $widget['cta_image']; ?>);"></div>
              <div class="careers-cta__content">
                <div class="careers-cta__heading"><?php echo $widget['cta_heading']; ?></div>
                <div class="careers-cta__copy"><?php echo do_content($widget['cta_copy']); ?></div>
              </div>
            </div>
            <?php endif; ?>
          </div>
        <?php elseif($widgetLayout === 'widget_trustpilot_divider'): ?>
          <?php $widget = get_sub_field('trustpilot_divider_widget'); ?>
          <div class="trustpilot-divider">
            <div class="wrapper">
              <div class="trustpilot-divider__divider">
                <img src="/wp-content/themes/colonialsurety/images/icons/trustpilot-logo.png" alt="" class="trustpilot-divider__logo"
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php if($includeWidgetWrapper): ?></div><?php endif; ?>
    </div>
  <?php endwhile; ?>
</div>
<?php endif; ?>