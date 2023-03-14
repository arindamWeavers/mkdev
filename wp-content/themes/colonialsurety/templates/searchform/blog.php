<?php $searchQuery = get_search_query() ?: (is_tag() ? get_queried_object()->name : '' ); ?>
<form role="search" method="get" class="search-form search-form--blog" action="<?php echo esc_url( home_url( '/' ) ) ?>">
    <div class="wrapper search-form__form-wrapper">
        <label class="search-form__label">
            <span class="screen-reader-text"><?php echo  _x( 'Search for:', 'label' ) ?></span>
            <input type="search" class="search-form__input" placeholder="<?php echo esc_attr_x( 'Search Articles', 'placeholder' ) ?>" value="<?php echo $searchQuery ?>" name="s" />
        </label>
        <input type="hidden" name="searchType" value="blog" />
        <button type="submit" class="search-form__submit btn" <?php echo !empty($searchQuery) ?: 'disabled' ?>><?php echo esc_attr_x( 'Search', 'submit button' ) ?></button>
    </div>
</form>