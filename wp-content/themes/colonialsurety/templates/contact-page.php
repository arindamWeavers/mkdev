<?php
/**
 * Template Name: Contact
 *
 * @package colonialsurety
 */
get_header() ?>
<div class="content-area">
    <main id="main" class="site-main">
        <?php /* FLEXIBLE CONTENT LOOP */
        if (have_rows('contact_fields')):
            while (have_rows('contact_fields')) : the_row();
                if (get_row_layout()):
                    get_template_part('template-parts/contact-fields/' . get_row_layout(), 'layout');
                endif;

            endwhile;
        endif; ?>
    </main>
    
<?php if (have_rows('widgets_bottom')):
    while (have_rows('widgets_bottom')) : the_row();
        $layOutName = get_row_layout();
        if ($layOutName === 'trust_pilot'):
            include(get_template_directory() . '/templates/includes/colonial-trust.php');
        else:
            include(get_template_directory() . '/templates/includes/' . $layOutName . '.php');
        endif;
    endwhile;
endif; ?>

</div> <!-- end .content-area -->
<?php get_footer(); ?>
<script>
    (function($) {
        // init SLECETRIC
       $('.contact-form select').selectric({
           disableOnMobile: true,
           nativeOnMobile: true
       });

       // Wrap Lowersections for styling
        $( ".contact-form, .contact-sidebar" ).wrapAll( "<div class='sectionWrapper'></div>" );

        $(document).on('selectric-select', 'select', function() {
            var select = $(this).closest('.selectric-wrapper').find('.selectric');
            $(select).addClass('selected');
        });

        // SET SECTION TO FULLWIDTH AFTER SUBMIT
        $(document).ajaxComplete(function(){
            $('.sectionWrapper').css('max-width','100%');
            $(document).prop('title','Your message has been sent | Colonial Surety');
        });

        $( '.countMe textarea' ).each(function(){
            console.log('HERE');
            var countdownBx = "<span aria-live='polite' class='countdown'></span>";
            $(this).attr('maxlength','2500');
            $(this).after(countdownBx);
            $( this ).keyup( function (e) {
                var maxChar = 2500;
                var characters = this.value;
                var numcharacters = characters.length;

                if(numcharacters >= maxChar
                    && e.keyCode !== 46
                    && e.keyCode !== 8 )
                {
                    e.preventDefault();
                    $(this).closest('.countMe').find('.countdown').html('<span aria-live="polite">0 Characters remaining</span>');
                }
                else{
                    if(numcharacters >= (maxChar - 100)) {
                        $(this).closest('.countMe').find('.countdown').css('display','block').addClass('counting').attr('aria-live','polite').html((maxChar - numcharacters) + ' Characters remaining');
                    }
                }

            });
        });

    })(jQuery);


</script>

