jQuery(document).ready(function($) {

	// icon picker
    $('.travelism-icon-picker').each( function() {
        $(this).iconpicker( '#' + this.id );
    } );
/*------------------------------------------------
                MAGNIFIC POPUP
------------------------------------------------*/

$('.popup-video').magnificPopup({
    type: 'iframe',
    mainClass: 'mfp-fade',
    preloader: true,
});

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});