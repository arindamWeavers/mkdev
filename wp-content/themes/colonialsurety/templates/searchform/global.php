<?php $searchQuery = is_blog_search() ? '' : get_search_query(); ?> 
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
    <div class="wrapper search-form__form-wrapper">
        <label class="search-form__label">
            <span class="screen-reader-text"><?php echo  _x( 'Search for:', 'label' ) ?></span>
            <input type="search" class="search-form__input" placeholder="<?php echo esc_attr_x( 'Type Your Search&hellip;', 'placeholder' ) ?>" value="<?php echo $searchQuery ?>" name="s" />
        </label>
        <button type="submit" class="search-form__submit btn" <?php echo $searchQuery ?: 'disabled' ?>><?php echo esc_attr_x( 'Search', 'submit button' ) ?></button>
    </div>
</form>