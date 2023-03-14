<?php
/**
 * Template Name: Report A Claim Page
 *
 * @package colonialsurety
 */
get_header();
?>


    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php /* FLEXIBLE CONTENT LOOP */
            if (have_rows('form_page_flex')):
                while (have_rows('form_page_flex')) : the_row();
                    if (get_row_layout()):
                        get_template_part('template-parts/form-page-flex/' . get_row_layout(), 'layout');
                    endif;

                endwhile;
            endif; ?>
        </main>
    </div>
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

<?php get_footer();?>
<script>
   (function($) {

       $('.claimSelectorContainer select, .claim-form-modal select').selectric({

        responsive: true,

           // Life Cycle Methods

           onInit: function() {
               setUpSelectric();
           },
           onOpen: function() {
               var targetUl = $(this).closest('.selectric-wrapper').find('.selectric-scroll ul');
               targetUl.attr('aria-expanded',"true");
               targetUl.attr('aria-hidden',"false");
               $(this).closest('.selectric-wrapper').find('.selectric-scroll').scrollTop(0);
           },
           onChange: function(element) {
               $(element).change();
               var targetUl = $(this).closest('.selectric-wrapper').find('.selectric-scroll ul');
               $(targetUl).children('li').attr('aria-selected',"false");
               $(targetUl).children('li.selected').attr('aria-selected',"true");
           },
           onClose: function() {
               var targetUl = $(this).closest('.selectric-wrapper').find('.selectric-scroll ul');
               targetUl.attr('aria-expanded',"false");
               targetUl.attr('aria-hidden',"true");
           },
           onRefresh: function() {
               setUpSelectric();
           }

       });
       $('.selectric-wrapper').addClass('RptClaimSelect');
       if($('.claim-form-modal')){
           $('.claim-form-modal .selectric-wrapper').removeClass('RptClaimSelect')
       }
$('#pdfs .halfWidth .link').append('<span class="sr-only">Opens a PDF in new window </span>');

function setUpSelectric(){
    var selectItems = $('.selectric-items');
    selectItems.each(function(){
        var ul = $(this).find('.selectric-scroll ul');

        ul.attr({'role':'tree',
            'aria-expanded':"false",
            'aria-hidden':"false"
        });
        var items = ul.find('li');
        items.each(function(){
            $(this).attr({'role':'treeitem',
                'aria-selected':"false",
            'tabindex':'0'});
        });
    });
}

    })(jQuery);
</script> 