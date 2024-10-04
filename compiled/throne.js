(function($) {
	
	/*
    -------------------------
    Docs
    -------------------------
    */
    $(window).on('load', function() {

        // Doc List
        $('.doc-item').each(function(index) {
            if ( $(this).attr('data-index') == 0 ) {
                $(this).attr('data-active', 'true');
            }
        });

        // Docs
        $('.doc').each(function (index) {
            if ($(this).attr('data-index') == 0) {
                $(this).attr('data-active', 'true');
            }
        });

    });

    // Doc Item Click
    $('.doc-item').on('click', function() {
        // clear all
        $('.doc-item').attr('data-active', 'false');
        $('.doc').attr('data-active', 'false');

        // this ID
        var id = $(this).attr('data-doc');

        // switch status
        if ( $(this).attr('data-active', 'false') ) {
            $(this).attr('data-active', 'true');
        }

       // show matching doc
       $('#' + id).attr('data-active', 'true');

       // slideout sidebar if on mobile
       $('.docs-sidebar').css({
            left: '-100%',
            right: '100%'
        });
        $('.sidebar-opener').find('.hamburger').attr('data-open', '');
        $('.hamburger').css('--label', '"Menu"');
    });

    $('.sidebar-opener').find('.hamburger').on('click', function() {

        if ( $(this).attr('data-open') == 'open' ) {
            $('.docs-sidebar').css({
                left: '-100%',
                right: '100%'
            });

            $('.hamburger').css('--label', '"Menu"');
        } else {
            $('.docs-sidebar').css({
                left: '0',
                right: '0'
            });

            $('.hamburger').css('--label', '"Close"');
        }

    });


})( jQuery );