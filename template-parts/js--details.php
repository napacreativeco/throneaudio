<script>
jQuery('details summary').each(function(){
    jQuery(this).nextAll().wrapAll('<div id="wrap"></div>');
});

jQuery('details').attr('open','').find('#wrap').css('display','none');

jQuery('details summary').click(function(e) {
    e.preventDefault();
    jQuery(this).siblings('div#wrap').slideToggle(function(){
        jQuery(this).parent('details').toggleClass('open');
    });
});
</script>