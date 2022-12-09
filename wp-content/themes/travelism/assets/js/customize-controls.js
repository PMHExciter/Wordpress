/**
 * Scripts within the customizer controls window.
 *
 */

jQuery( document ).ready(function($) {
    //Chosen JS
    $(".travelism-chosen-select").chosen({
        width: "100%"
    });

    // icon picker
    $('.travelism-icon-picker').each( function() {
        $(this).iconpicker( '#' + this.id );
    } );

    //Switch Control
    $('body').on('click', '.onoffswitch', function(){
        var $this = $(this);
        if($this.hasClass('switch-on')){
            $(this).removeClass('switch-on');
            $this.next('input').val( false ).trigger('change')
        }else{
            $(this).addClass('switch-on');
            $this.next('input').val( true ).trigger('change')
        }
    });


    $( document ).on( 'click', '.customize_multi_add_field', travelism_customize_multi_add_field )
        .on( 'change', '.customize_multi_single_field', travelism_customize_multi_single_field )
        .on( 'click', '.customize_multi_remove_field', travelism_customize_multi_remove_field )

    /********* Multi Input Custom control ***********/
    $( '.customize_multi_input' ).each(function() {
        var $this = $( this );
        var multi_saved_value = $this.find( '.customize_multi_value_field' ).val();
        if (multi_saved_value.length > 0) {
            var multi_saved_values = multi_saved_value.split( "|" );
            $this.find( '.customize_multi_fields' ).empty();
            var $control = $this.parents( '.customize_multi_input' );
            $.each(multi_saved_values, function( index, value ) {
                $this.find( '.customize_multi_fields' ).append( '<div class="set"><input type="text" value="' + value + '" class="customize_multi_single_field" /><span class="customize_multi_remove_field"><span class="dashicons dashicons-no-alt"></span></span></div>' );
            });
        }
    });

    function travelism_customize_multi_add_field(e) {
        var $this = $( e.currentTarget );
        e.preventDefault();
            var $control = $this.parents( '.customize_multi_input' );
            $control.find( '.customize_multi_fields' ).append( '<div class="set"><input type="text" value="" class="customize_multi_single_field" /><span class="customize_multi_remove_field"><span class="dashicons dashicons-no-alt"></span></span></div>' );
            travelism_customize_multi_write( $control );
    }

    function travelism_customize_multi_single_field() {
        var $control = $( this ).parents( '.customize_multi_input' );
        travelism_customize_multi_write( $control );
    }

    function travelism_customize_multi_remove_field(e) {
        e.preventDefault();
        var $this = $( this );
        var $control = $this.parents( '.customize_multi_input' );
        $this.parent().remove();
        travelism_customize_multi_write( $control );
    }

    function travelism_customize_multi_write( $element) {
        var customize_multi_val = '';
        $element.find( '.customize_multi_fields .customize_multi_single_field' ).each(function() {
            customize_multi_val += $( this ).val() + '|';
        });
        $element.find( '.customize_multi_value_field' ).val( customize_multi_val.slice( 0, -1 ) ).change();
    }       
});

jQuery(document).ready(function($) {
    // Sortable sections
    jQuery( 'ul.travelism-sortable-list' ).sortable({
        handle: '.travelism-drag-handle',
        axis: 'y',
        update: function( e, ui ){
            jQuery('input.travelism-sortable-input').trigger( 'change' );
        }
    });

    /* On changing the value. */
    jQuery( "body" ).on( 'change', 'input.travelism-sortable-input', function() {
        /* Get the value, and convert to string. */
        this_checkboxes_values = jQuery( this ).parents( 'ul.travelism-sortable-list' ).find( 'input.travelism-sortable-input' ).map( function() {
            return this.value;
        }).get().join( ',' );

        /* Add the value to hidden input. */
        jQuery( this ).parents( 'ul.travelism-sortable-list' ).find( 'input.travelism-sortable-value' ).val( this_checkboxes_values ).trigger( 'change' );

    });
});

/**
 * Add a listener to update other controls to new values/defaults.
 */

( function( api ) {

      const  travelism_section_lists = ['hero_banner_section','blog_slider_section','blog_featured_post_section','business_service_section','shop_recent_products_section','business_about_section','trending_products_section','blog_cta_section','business_team_section','business_counter_section','blog_popular_post_section','most_read_post_section','northface_jacket_section','featured_section','video_section','wildlife_section','gallery_section','happy_clients_section','logos_section','featured_products_section','subscribe_now_section','articles_section','recent_post_section'];
    travelism_section_lists.forEach( travelism_homepage_scroll );

    function travelism_homepage_scroll(item, index) {
         // Detect when the front page sections section is expanded (or closed) so we can adjust the preview accordingly.
        wp.customize.section( 'travelism_'+item, function( section ) {
            section.expanded.bind( function( isExpanding ) {
                console.log(isExpanding);
                // Value of isExpanding will = true if you're entering the section, false if you're leaving it.
                wp.customize.previewer.send( item, { expanded: isExpanding });
            } );
        } );
    }

    wp.customize( 'travelism_theme_options[reset_options]', function( setting ) {
        setting.bind( function( value ) {
            var code = 'needs_refresh';
            if ( value ) {
                setting.notifications.add( code, new wp.customize.Notification(
                    code,
                    {
                        type: 'info',
                        message: travelism_reset_data.reset_message
                    }
                ) );
            } else {
                setting.notifications.remove( code );
            }
        } );
    } );

    // Deep linking for menus
    wp.customize.bind('ready', function() {
        jQuery('a.topbar-menu-trigger').click(function(e) {
            e.preventDefault();
            wp.customize.section( 'menu_locations' ).focus()
        });
    });
} )( wp.customize );