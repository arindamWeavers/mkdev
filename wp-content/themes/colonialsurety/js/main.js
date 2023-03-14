// FORMIDABLE GLOBAL FUNCTIONS
jQuery(document).ready(function($){
    // close form confirmation page on click of Close button
    $(document).on('click', '.form-confirmation .confirm-close .confirm-close-modal', function() {
        $('.claim-form-modal').toggle();
        $('.content-area').css('position', 'relative');
        $('#page').css('position', 'static');
        $('.page-template-report-claim-page').css('overflow', 'visible');
        resetDropdowns();
        location.reload(true);
    });

    var reportAClaimForm = $('#form_reportaclaimtypeselector');

    function resetDropdowns(){
        $(reportAClaimForm).find('select').each(function(){
            $(this).prop('selectedIndex', 0).selectric('refresh');
            $(this).closest('.selectric-wrapper').addClass('RptClaimSelect');
        });
    }

    // $('.selectric-wrapper').on('focusin',function(){
    //     $(this).removeClass('selectric-open');
    // });

    // $('.selectric-wrapper').on('click',function(){
    //     $(this).addClass('selectric-open');
    // });

    $('.selectric-wrapper').parent().prev().keydown(function(e) {
        var code = e.keyCode || e.which;
    
        if (code === 9) {  
            // e.preventDefault();
            $('select').selectric('close');
        }
    });

    $('.formDate input').toArray().forEach(function(field){
        new Cleave(field, {
            date: true,
            delimiter: '/',
            datePattern: ['m', 'd', 'Y']
        });
    });

    $('.formNumber input').toArray().forEach(function(field){
        new Cleave(field, {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    });

    $('.dollarSign input').toArray().forEach(function(field){
        new Cleave(field, {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    });

    $('.frm_forms .frm_form_field.formDate input').on('focusout',function(){
        var enteredDate = moment( $(this).val() , 'MM-DD-YYYY' );
        var now = moment();
        var past = moment().subtract(10, 'years');
        if (enteredDate.isAfter(now)) {
            $(this).parent().addClass('frm_blank_field');
            $(this).parent().removeClass('frm_valid');
            $(this).val('');
            if( !$(this).siblings('.frm_error').length ) {
                $(this).after('<div class="frm_error">'+$(this).attr('data-reqmsg')+'</div>');
            }
        } else if (enteredDate.isBefore(now) && enteredDate.isAfter(past)) {
            $(this).parent().removeClass('frm_blank_field');
            $(this).parent().addClass('frm_valid');
        } else {
            console.log('catchall date error');
            $(this).parent().addClass('frm_blank_field');
            $(this).parent().removeClass('frm_valid');
            if( !$(this).siblings('.frm_error').length ) {
                $(this).after('<div class="frm_error">'+$(this).attr('data-reqmsg')+'</div>');
            }
        }
    });


      // if required input and empty, show error
      $('.frm_forms .frm_form_field.frm_required_field:not(.formDate, .dollarSign) input:not([class="selectric-input"])').on('focusout',function(){
        var input = $(this).val();
        var empty = "";
        if(input === empty) {
            $(this).parent().addClass('frm_blank_field');
            $(this).parent().removeClass('frm_valid');
            if( !$(this).siblings('.frm_error').length ) {
                $(this).after('<div class="frm_error">'+$(this).attr('data-reqmsg')+'</div>');
            }
        } else {
            $(this).parent().removeClass('frm_blank_field');
            $(this).parent().addClass('frm_valid');
        }
    });

     // if required input and empty, show error
     $('.frm_forms .frm_form_field.frm_required_field .selectric-wrapper').on('focusout' ,function(){
        var input = $(this).find('.selectric-items li[data-index="0"]');
        if( input.hasClass('selected') ) {
            $(this).parent().addClass('frm_blank_field');
            $(this).parent().removeClass('frm_valid');
            if( !$(this).siblings('.frm_error').length ) {
                $(this).after('<div class="frm_error">'+$(this).find('select').attr('data-reqmsg')+'</div>');
            }
        }else{
            $(this).parent().removeClass('frm_blank_field');
            $(this).parent().addClass('frm_valid');
        }
    });

   // if required input and empty, show error
   $('form.frm_pro_form').on('submit', function() {
       
        $('.frm_forms .frm_form_field.frm_required_field .selectric-wrapper').each( function() {
            var input = $(this).find('.selectric-items li[data-index="0"]');
            if( input.hasClass('selected') ) {
                parentDiv = $(this).parent('.selectContainer');
                $(parentDiv).addClass('frm_blank_field_select');
                $(this).parent().removeClass('frm_valid');
                if( !$(parentDiv).find('.frm_error').length ) {
                    $(parentDiv).find('.select-wrapper').after('<div class="frm_error">'+$(this).find('select').attr('data-reqmsg')+'</div>');
                }
            }
        });
    });

    // on submit of report a claim form, remove all scrollbars by setting all overflows to hidden
    $('.page-template-report-claim-page .claim-form-modal form').on('submit', function() {
        $('.page-template-report-claim-page').css('overflow', 'hidden');
    });


    // if required textarea and empty, show error
    $('.frm_forms .frm_form_field.frm_required_field textarea').on('focusout',function(){
        var input = $(this).val();
        var empty = "";
        if(input === empty) {
            $(this).parent().addClass('frm_blank_field');
            $(this).parent().removeClass('frm_valid');
            if( !$(this).siblings('.frm_error').length ) {
                $(this).after('<div class="frm_error">'+$(this).attr('data-reqmsg')+'</div>');
            }
        }else{
            $(this).parent().removeClass('frm_blank_field');
            $(this).parent().addClass('frm_valid');
        }
    });

    //add class on forms to validate them and add styling
    $('.frm_forms .frm_form_field.dollarSign input[type="text"]').on('focusout',function(){
        var input = $(this).val();
        var regex = new RegExp( "^(?:\[0-9]+|[0-9]{1,3}(?:,[0-9]{3})+)(?:(\.|,)[0-9]+)?$" );
        if(regex.test(input)) {
            $(this).parent().removeClass('frm_blank_field');
            $(this).parent().addClass('frm_valid');
            $(this).parent().find('.frm_error').remove();
        }else {
            $(this).parent().addClass('frm_blank_field');
            $(this).parent().removeClass('frm_valid');
        }
    });

    $('.frm_forms .frm_form_field.formNumber input[type="text"]').on('focusout',function(){
        var input = $(this).val();
        var regex = new RegExp( "^[0-9,]+$" );
        if(regex.test(input)) {
            $(this).parent().removeClass('frm_blank_field');
            $(this).parent().addClass('frm_valid'); 
        }else {
            $(this).parent().addClass('frm_blank_field');
            $(this).parent().removeClass('frm_valid');
            if( !$(this).siblings('.frm_error').length ) {
                $(this).after('<div class="frm_error">'+$(this).attr('data-reqmsg')+'</div>');
            }
        }
    });

    $('.frm_forms .frm_form_field.zipCode input[type="text"]').on('focusout',function(){
        var input = $(this).val();
        var regex = new RegExp( "^[0-9]{5}(-[0-9]{4})?$" );
        if(regex.test(input)) {
            $(this).parent().removeClass('frm_blank_field');
            $(this).parent().addClass('frm_valid'); 
        }else {
            $(this).parent().addClass('frm_blank_field');
            $(this).parent().removeClass('frm_valid');
        }
    });

    // $('.frm_forms .frm_form_field:not(".zipCode, .dollarSign, .formNumber") input[type="text"]').on('focusout',function(){
    //     // //console.log('TEXT FIELD VALIDATION');
    //     var input = $(this).val();
    //     var regex = new RegExp( "^[a-zA-Z0-9 ]+$" );
    //     if(regex.test(input)) {
    //         $(this).parent().removeClass('frm_blank_field');
    //         $(this).parent().addClass('frm_valid'); 
    //     }else {
    //         $(this).parent().addClass('frm_blank_field');
    //         $(this).parent().removeClass('frm_valid');
    //     }
    // });

    $('.frm_forms .frm_form_field input[type="tel"]').on('focusout',function(){
        var input = $(this).val();
        var regex = new RegExp( "^([\(]{1}[0-9]{3}[\)]{1}[ ]{1}[0-9]{3}[\-]{1}[0-9]{4})$" );
        if(regex.test(input)) {
            $(this).parent().removeClass('frm_blank_field');
            $(this).parent().addClass('frm_valid'); 
        }else {
            $(this).parent().addClass('frm_blank_field');
            $(this).parent().removeClass('frm_valid');
        }
    });

    $('.frm_forms .frm_form_field input[type="email"]').on('focusout',function(){
        var input = $(this).val();
        var regex = new RegExp( "^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$", "i" );
        if(regex.test(input)) {
            $(this).parent().removeClass('frm_blank_field');
            $(this).parent().addClass('frm_valid'); 
        }else {
            $(this).parent().addClass('frm_blank_field');
            $(this).parent().removeClass('frm_valid');
        }
    });

    $('#field_d9p08').attr('aria-label', 'Other Subject');
    $('#field_so2em').attr('aria-label', 'Other Information');

        //tab-index to checkbox items
    $('.frm_checkbox').each(function() {
        $(this).attr('tabindex', '0');
        // $(this).find('label').attr('tabindex', '-1');
    
    });



    $('.frm_forms form').on('submit', function() {
        setTimeout(function() {
            // console.log('submit button clicked');
            var fieldError =  $('.frm_forms form').find('.frm_error').first().siblings('input, textarea');
            // console.log('fieldError length: ', fieldError.length);
            if( fieldError.length === 1 ) {
                // console.log('input/textarea error', fieldError);
                fieldError.focus();
            }
            // var fieldErrorLength = fieldError.length;
            else{
                fieldError = "";
                fieldError = $('.frm_forms form').find('.frm_error').first().siblings('.selectric-wrapper').find('select');
                console.log('Select box error:', fieldError);
                fieldError.selectric('open');
                fieldError.focus();
            }
            // fieldError.focus();
        }, 1000);
        
    });
        
    // focused = $('.form  input:first');

    // $('.frm_forms form').on('submit', function() {
    //     var intervalFocus = setInterval(function() {
    //         focused = $('form .frm_blank_field').find('input, textarea, select')[0];
    //         focused.focus();
    //         clearInterval(intervalFocus);

    //             // var fieldError =  $('form .frm_blank_field').find("input, textarea");
    //             //var fieldError.focus(); $('.form').find('.frm_error').first().siblings('input, textarea')
    //             // if( fieldError.length ) {
    //             //     var focused = fieldError[0];
    //             //     $(fieldError[0]).focus();
    //             //     //console.log(focused);
    //             // }
    //             // setTimeout(function(){
    //             //     $(window).scroll();
    //             //     //console.log("scroll");
    //             //     $(fieldError[0]).focus().trigger("focus");
    //             // },2000);
    //             // fieldError.focus();
    //     // }
    //     }, 100);
        
    // });

    // $(document).ajaxComplete(function(){
    //     //console.log('AJAX COMPLETE');
    //     //console.log("interval",$('form .frm_blank_field').length);
    //     focused = $('form .frm_blank_field').find('input, textarea')[0];
    //     //console.log(focused);
    //     focused.focus();
    // });

});

function setInnerTitleWidth() {
    jQuery(".widget h2.title span span").each(function (a, b) {
        jQuery(b).parent().css("width", jQuery(b).outerWidth() + 10 + "px")
    }), jQuery(window).resize(function () {
        jQuery(".widget h2.title span span").each(function (a, b) {
            jQuery(b).parent().css("width", jQuery(b).outerWidth() + 10 + "px")
        })
    })
}

function setBlockHeight(a) {
    var b, c, d = jQuery(a);
    if (d.removeAttr("style"), window.innerWidth > 960) {
        c = Math.ceil(d.length / 3);
        for (var e = 0; e < c; e++) b = Math.max(e, d.eq(3 * e).height(), d.eq(3 * e + 1).height(), d.eq(3 * e + 2).height()), d.slice(3 * e, 3 * e + 3).height(b)
    } else if (window.innerWidth > 768) {
        c = Math.ceil(d.length / 2);
        for (var e = 0; e < c; e++) b = Math.max(e, d.eq(2 * e).height(), d.eq(2 * e + 1).height()), d.slice(2 * e, 2 * e + 2).height(b)
    }
}

// add select class to container for select boxes
jQuery(document).ready(function (a) {

    var selectBXs = a('div.frm_forms.frm_style_formidable-style.with_frm_style select');
    selectBXs.each(function(){
        a( this ).closest('div').addClass( "selectContainer" );
    });

    function d() {
        var b = a(window).scrollTop() + window.innerHeight;
        b >= a(".site-footer").offset().top ? a(".contact-us").addClass("stuck") : a(".contact-us").removeClass("stuck")
    }

    a(".search-toggle, .site-header .search a").click(function (b) {
        b.preventDefault(), b.stopPropagation(), a(this).parents("nav").toggleClass("search-open"), a("#page").removeClass("mobile-menu-open"), a(this).parents("nav").hasClass("search-open") ? (a(".site-header .search-field").focus(), a(document).bind("keyup.search", function (b) {
            27 == b.keyCode && a(".site-header .search a").trigger("click")
        }), a("#site-navigation.toggled").removeClass("toggled")) : a(document).unbind("keyup.search")
    });
    var b = a(".search-form");
    b.on("submit", function (a) {
        jQuery(this).find(".search-field").val().length || (a.preventDefault(), a.stopPropagation())
    }), a(".menu-toggle").click(function (b) {
        b.preventDefault(), b.stopPropagation(), a("#page").toggleClass("mobile-menu-open"), a("#site-navigation.search-open").removeClass("search-open")
    }), a(".sub-menu-wrap > .sub-menu > li").first().addClass("hover"), a(".sub-menu-wrap > .sub-menu > li").hover(function () {
        a(this).siblings(".hover").removeClass("hover"), a(this).siblings(".nosep").removeClass("nosep"), a(this).prev().addClass("nosep"), a(this).addClass("hover")
    }, function () {
    }), a(".menu .description").each(function (b, c) {
        $wrapper = a(this).siblings(".sub-menu-wrap"), a(c).detach().appendTo($wrapper)
    }), a(".sub-menu-wrap").before('<button class="sub-menu-toggle"></button>'), a(".default.slider").slick({
        dots: !0,
        draggable: !1,
        adaptiveHeight: !1,
        responsive: [{
            breakpoint: 480,
            settings: {
                arrows: !1
            }
        }]
    }), a(".rotating-banner.slider").on("init", function (b) {
        var c = a(b.target).height();
        a(b.target).find(".slick-slide").css("height", c + "px")
    }).slick({
        autoplay: true,
        autoplaySpeed: 6000,
        arrows: !0,
        dots: !0,
        draggable: !1,
        adaptiveHeight: !1,
        init: function () {
            //console.log("init")
        },
        reInit: function () {
            //console.log("reinit")
        },
        fade: a(".rotating-banner").hasClass("fade")
    }), a("select.wpcf7-select").each(function () {
        return console.log(a(this)), !!a(this).hasClass("no-slick") || void a(this).ddslick({
            background: "#ffffff",
            width: "100%"
        })
    }), a("select.dd").each(function (b, c) {
        a(c).ddslick({
            background: "#ffffff",
            width: 208,
            onSelected: function (a) {
                a.selectedIndex > 0 && (document.location.href = a.selectedData.value)
            }
        })
    }), a(".filters select").each(function (b, c) {
        a(c).ddslick({
            background: "#ffffff",
            width: 168
        })
    }), a(".blog-header a.update").click(function (b) {
        b.preventDefault();
        var c = ("" == a("#categories .dd-selected-value").val() ? "/" : a("#categories .dd-selected-value").val()) + a("#archives .dd-selected-value").val() + ("" !== a("#tags .dd-selected-value").val() ? "?tag=" + a("#tags .dd-selected-value").val() : "");
        document.location.href = "/" == c ? a("#blog").val() : c
    }), a(".contact-us button.toggle").click(function () {
        $contact = a(this).parents(".contact-us"), $contact.toggleClass("open"), $contact.hasClass("stuck") && a("html, body").animate({
            scrollTop: a(document).height()
        }, 400)
    }), a(".fancybox").fancybox({
        fitToView: !1,
        height: 405,
        width: 720,
        maxWidth: "100%",
        autoResize: !0,
        aspectRatio: !0,
        closeClick: !1,
        openEffect: "none",
        closeEffect: "none"
    }), a("a.share").click(function (b) {
        b.preventDefault(), b.stopPropagation(), a(this).siblings(".share-box").toggleClass("open")
    }), a("body").click(function (b) {
        a(".share-box").removeClass("open")
    }), a(".share-box").click(function (a) {
        a.stopPropagation()
    }), a(document).keyup(function (b) {
        27 == b.keyCode && a(".share-box").removeClass("open")
    }), a(".wpcf7-form input[type=submit], #main .search-submit").after('<span class="input_hack"></span>'), a(".wpcf7-form input[type=submit], #main .search-submit").hover(function () {
        a(this).next().toggleClass("hover")
    }), a(".products-widget .standard .column").length % 2 != 0 && a(".products-widget .standard .column").last().addClass("last"), a(".products-widget .standard .column:odd").addClass("odd"), a(".mc4wp-response").is(":empty") || a(".contact-us").addClass("open"), a("#primary-menu").css("height", window.innerHeight - a(".site-header").outerHeight() + "px"), a(window).resize(function () {
        a("#primary-menu").css("height", window.innerHeight - a(".site-header").outerHeight() + "px"), a(".slick-slide").css("height", ""), a(".slick-track").each(function (b, c) {
            var d = a(c).height();
            a(c).find(".slick-slide").css("height", d + "px")
        })
    }), a(".toggled #primary-menu, .site-header .search-form").click(function (a) {
        a.stopPropagation()
    }), a(".basic-cta .features a").length % 2 == 0 ? a(".basic-cta .features a:last-of-type").prev().andSelf().addClass("last") : a(".basic-cta .features a:last-of-type").addClass("last"), a(".post-categories a").click(function (a) {
        a.stopPropagation()
    }), a("body").hasClass("page-template-products-grid") && setBlockHeight(".product"), a(".content").hasClass("blog") && setBlockHeight(".job, .post"), a(window).resize(function () {
        a("body").hasClass("page-template-products-grid") && setBlockHeight(".product"), a(".content").hasClass("blog") && setBlockHeight("article.column")
    }), a("body").hasClass("page-template-products-grid") && setBlockHeight(".product"), a(".content").hasClass("blog") && setBlockHeight("article.column"), a(".sub-menu-wrap > .sub-menu").each(function (b, c) {
        a(c).children().last().children("a").css("paddingBottom", a(c).parent().height() - a(c).height() + "px")
    }), a(".testimonials.widget .testimonial").each(function (b, c) {
        a(c).css("marginTop", (a(c).parents(".slick-list").height() - a(c).height()) / 2 + "px")
    }), setInnerTitleWidth(), jQuery(".f-number").each(function () {
        this.onkeypress = function (a) {
            return !/[А-Яа-яA-Za-z ]/.test(String.fromCharCode(a.charCode))
        }
    })
}),
    function () {
        var a = navigator.userAgent.toLowerCase().indexOf("webkit") > -1,
            b = navigator.userAgent.toLowerCase().indexOf("opera") > -1,
            c = navigator.userAgent.toLowerCase().indexOf("msie") > -1;
        (a || b || c) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function () {
            var b, a = location.hash.substring(1);
            /^[A-z0-9_-]+$/.test(a) && (b = document.getElementById(a), b && (/^(?:a|select|input|button|textarea)$/i.test(b.tagName) || (b.tabIndex = -1), b.focus()))
        }, !1)
    }(), jQuery(function (a) {
    a('input[name="amount_per_year"]').change(function () {
        //console.log(a(this).val()), a('input[name="premium_per_year"]').val(Math.round(.008 * a(this).val(), 0))
    })
});