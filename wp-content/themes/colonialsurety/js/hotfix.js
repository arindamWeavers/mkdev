jQuery( document ).ready( function( $ ) {

    var focusable = 'button, [href], input, select, textarea';
    $('#top-menu li:last-child a').on('click',function(e) {
        var $this = $(this);
        var expanded = $this.attr('aria-expanded') == 'true' ? true : false;
        
        e.preventDefault();

        if(expanded) {
            $this.trigger('close');
        } else {
            $this.trigger('open')
        }
    }).attr('id','top-nav-login').attr('aria-expanded',false).parent().attr('aria-haspopup',true);

    $('body').on('open','#top-nav-login', function () {
        $('.top-navigation__login').slideDown().find(focusable).first().focus();
        $(this).attr('aria-expanded', true);
    });

    $('body').on('close','#top-nav-login',function() {
        $('.top-navigation__login').slideUp();
        $(this).attr('aria-expanded',false);
    });

    $('body').on('closeAndFocus','#top-nav-login', function () {
        $(this).trigger('close').focus();
    });

    $('body').on('keydown','#top-nav-login',function(e) {
        // TAB: Do not activate 
        if (e.keyCode === 9) {
            $(this).trigger('close');
            if(!e.shiftKey) {
                e.preventDefault();
                $('.main-header__logo-link').focus();
            }
        // UP or DOWN
        } else if(e.keyCode === 38 || e.keyCode === 40) {
            e.preventDefault();
            $(this).trigger('click');
            var $focusable = $('.top-navigation__login').find(focusable);
            $focusable.eq(e.keyCode === 40 ? 0 : $focusable.length - 1).focus();
        }
    });

    $('body').on('keydown','.top-navigation__login-link',function(e) {
        // TAB or ESC: Close Menu and focus on menu button
        // TAB FORWARD
        if (e.keyCode === 9 && !e.shiftKey) {
            e.preventDefault();
            $('#top-nav-login').trigger('close');
            $('.main-header__logo-link').focus();
        // TAB REVERSE
        } else if (e.keyCode === 9 && e.shiftKey) {
            e.preventDefault();
            $('#top-nav-login').trigger('close');
            $('#top-nav-login').parent().prev().find(focusable).focus();
        } else if (e.keyCode === 27) {
            e.preventDefault();
            $('#top-nav-login').trigger('closeAndFocus');
        // LEFT: Close menu and select previous menu item
        } else if (e.keyCode === 37) {
            $('#top-nav-login').trigger('close');
            $('#top-nav-login').parent().prev().find(focusable).focus();
        // UP: Focus on previous focusable item
        } else if (e.keyCode === 38) {
            e.preventDefault();
            var $item = $(this);
            var $items = $item.closest('.top-navigation__login').find(focusable);
            var index = $items.index($item);
            var prevIndex = index === 0 ? $items.length - 1 : index - 1;
            $items.eq(prevIndex).focus();
        // RIGHT: Close menu and select next menu item
        } else if (e.keyCode === 39) {
            $('#top-nav-login').trigger('close');
            $('.main-header__logo-link').focus();
        // DOWN: Focus on previous focusable item
        } else if (e.keyCode === 40) {
            e.preventDefault();
            var $item = $(this);
            var $items = $item.closest('.top-navigation__login').find(focusable);
            var index = $items.index($item);
            var nextIndex = index === $items.length - 1 ? 0 : index + 1;
            $items.eq(nextIndex).focus();
        }
    });

    $('body').on('click', function (e) {
        var $target = $(e.target);
        var $loginButton = $('#top-nav-login');
        if ($target.attr('id') !== 'top-nav-login' && $loginButton.attr('aria-expanded') == 'true') {
            $loginButton.trigger('closeAndFocus');
        }
        // $('.top-navigation__login').slideUp();
    });






} ); // end no-conflict document ready