<div class="social-share">
  <h2 class="social-share__heading" id="article-share">Share this <?php echo is_singular('career') ? 'Opening' : 'Article'; ?></h2>
  <ul class="social-share__list" aria-labelledby="article-share">
    <li class="social-share__item">
      <a href="https://www.facebook.com/sharer.php?u=<?php echo urlencode(get_the_permalink()); ?>" class="social-share__link social-share__link--facebook">
        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
            <g fill="none" fill-rule="evenodd">
                <g stroke="#94A5AF" stroke-linecap="round" stroke-width="2" class="social-share__icon-arrow">
                    <path d="M1 17c0 8.836 7.164 16 16 16 8.837 0 16-7.164 16-16 0-8.837-7.163-16-16-16A15.956 15.956 0 0 0 5.348 6.035"/>
                    <path stroke-linejoin="round" d="M5 1v5h5"/>
                </g>
                <path d="M9 9h16v16H9z"/>
                <path fill="#102938" d="M21.309 11.656l-1.506.001c-1.181 0-1.41.561-1.41 1.384v1.816h2.817l-.367 2.845h-2.45V25h-2.937v-7.298H13v-2.845h2.456V12.76c0-2.435 1.487-3.76 3.658-3.76 1.04 0 1.934.077 2.195.112v2.544z"/>
            </g>
        </svg>
        <span class="sr-only">Share this article on Facebook, opens a new pop up window</span>
      </a>
    </li>
    <li class="social-share__item">
      <a href="https://twitter.com/intent/tweet?text=<?php echo trim(urlencode(get_the_title()) . '%0a' . urlencode(get_the_permalink())); ?>" class="social-share__link social-share__link--twitter">
        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
            <g fill="none" fill-rule="evenodd">
                <g stroke="#94A5AF" stroke-linecap="round" stroke-width="2" class="social-share__icon-arrow">
                    <path d="M1 17c0 8.836 7.164 16 16 16 8.837 0 16-7.164 16-16 0-8.837-7.163-16-16-16A15.956 15.956 0 0 0 5.348 6.035"/>
                    <path stroke-linejoin="round" d="M5 1v5h5"/>
                </g>
                <path fill="#102938" d="M23.362 13.239c.006.141.01.282.01.425 0 4.337-3.302 9.339-9.34 9.339A9.294 9.294 0 0 1 9 21.529c.257.03.518.045.783.045a6.584 6.584 0 0 0 4.077-1.405 3.285 3.285 0 0 1-3.067-2.279 3.312 3.312 0 0 0 1.483-.057 3.283 3.283 0 0 1-2.633-3.218v-.042c.442.246.949.394 1.487.411a3.282 3.282 0 0 1-1.016-4.383 9.32 9.32 0 0 0 6.766 3.43 3.283 3.283 0 0 1 5.593-2.994 6.568 6.568 0 0 0 2.085-.796 3.299 3.299 0 0 1-1.443 1.816A6.587 6.587 0 0 0 25 11.54a6.682 6.682 0 0 1-1.638 1.699"/>
            </g>
        </svg>
        <span class="sr-only">Share this article on Twitter, opens a new pop up window</span></a>
    </li>
    <li class="social-share__item">
      <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_the_permalink()); ?>" class="social-share__link social-share__link--linkedin">
        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
            <g fill="none" fill-rule="evenodd">
                <g stroke="#94A5AF" stroke-linecap="round" stroke-width="2" class="social-share__icon-arrow">
                    <path d="M1 17c0 8.836 7.164 16 16 16 8.837 0 16-7.164 16-16 0-8.837-7.163-16-16-16A15.956 15.956 0 0 0 5.348 6.035"/>
                    <path stroke-linejoin="round" d="M5 1v5h5"/>
                </g>
                <g fill="#102938">
                    <path d="M25 24.971h-3.315v-5.188c0-1.237-.022-2.828-1.723-2.828-1.725 0-1.988 1.348-1.988 2.74v5.276h-3.312V14.303h3.178v1.459h.046c.442-.839 1.524-1.724 3.137-1.724 3.357 0 3.977 2.209 3.977 5.082v5.851zM10.924 12.846a1.923 1.923 0 1 1-.003-3.845 1.923 1.923 0 0 1 .003 3.845zM12.582 24.971H9.263V14.303h3.319z"/>
                </g>
            </g>
        </svg>
        <span class="sr-only">Share this article on LinkedIn, opens a new pop up window</span>
      </a>
    </li>
    <li class="social-share__item">
      <a href="mailto:?subject=<?php echo rawurlencode(get_the_title()); ?>&body=<?php echo rawurlencode(get_the_permalink()); ?>" class="social-share__link social-share__link--email">
        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
            <g fill="none" fill-rule="evenodd" stroke-linecap="round">
                <g stroke="#94A5AF" stroke-width="2" class="social-share__icon-arrow">
                    <path d="M1 17c0 8.836 7.164 16 16 16 8.837 0 16-7.164 16-16 0-8.837-7.163-16-16-16A15.956 15.956 0 0 0 5.348 6.035"/>
                    <path stroke-linejoin="round" d="M5 1v5h5"/>
                </g>
                <g stroke="#102938" stroke-width="1.3">
                    <path stroke-linejoin="round" d="M10 10l14 7-14 7 1.517-6.942z"/>
                    <path d="M11.75 17H17"/>
                </g>
            </g>
        </svg>
        <span class="sr-only">Share this article on Email, opens a new pop up window</span>
      </a>
    </li>
  </ul>
</div>