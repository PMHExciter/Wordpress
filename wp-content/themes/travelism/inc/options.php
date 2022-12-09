<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function travelism_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'travelism' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function travelism_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'travelism' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

/**
 * List of trips for post choices.
 * @return Array Array of post ids and name.
 */
function travelism_trip_choices() {
    $posts = get_posts( array( 'post_type' => 'itineraries', 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'travelism' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

function travelismduct_choices() {
    $full_product_list = array();
    $product_id = array();
    $loop = new WP_Query(array('post_type' => array('product', 'product_variation'), 'posts_per_page' => -1));
    while ($loop->have_posts()) : $loop->the_post();
        $product_id[] = get_the_id();
    endwhile;
    wp_reset_postdata();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'travelism' );
    foreach ( $product_id  as $id ) {
        $choices[ $id ] = get_the_title( $id );
    }
    return  $choices;
}




if ( ! function_exists( 'travelism_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function travelism_selected_sidebar() {
        $travelism_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'travelism' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'travelism' ),
            'optional-sidebar-2'    => esc_html__( 'Optional Sidebar 2', 'travelism' ),
            'optional-sidebar-3'    => esc_html__( 'Optional Sidebar 3', 'travelism' ),
            'optional-sidebar-4'    => esc_html__( 'Optional Sidebar 4', 'travelism' ),
        );

        $output = apply_filters( 'travelism_selected_sidebar', $travelism_selected_sidebar );

        return $output;
    }
endif;

if ( ! function_exists( 'travelism_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function travelism_site_layout() {
        $travelism_site_layout = array(
            'wide-layout'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'travelism_site_layout', $travelism_site_layout );
        return $output;
    }
endif;


if ( ! function_exists( 'travelism_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function travelism_global_sidebar_position() {
        $travelism_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'travelism_global_sidebar_position', $travelism_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'travelism_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function travelism_sidebar_position() {
        $travelism_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'travelism_sidebar_position', $travelism_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'travelism_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function travelism_pagination_options() {
        $travelism_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'travelism' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'travelism' ),
        );

        $output = apply_filters( 'travelism_pagination_options', $travelism_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'travelism_get_spinner_list' ) ) :
    /**
     * List of spinner icons options.
     * @return array List of all spinner icon options.
     */
    function travelism_get_spinner_list() {
        $arr = array(
            'default'               => esc_html__( 'Default', 'travelism' ),
            'spinner-wheel'         => esc_html__( 'Wheel', 'travelism' ),
            'spinner-double-circle' => esc_html__( 'Double Circle', 'travelism' ),
            'spinner-two-way'       => esc_html__( 'Two Way', 'travelism' ),
            'spinner-umbrella'      => esc_html__( 'Umbrella', 'travelism' ),
            'spinner-dots'          => esc_html__( 'Dots', 'travelism' ),
            'spinner-one-way'       => esc_html__( 'One Way', 'travelism' ),
            'spinner-fidget'        => esc_html__( 'Fidget', 'travelism' ),
        );
        return apply_filters( 'travelism_spinner_list', $arr );
    }
endif;

if ( ! function_exists( 'travelism_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function travelism_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'travelism' ),
            'off'       => esc_html__( 'Disable', 'travelism' )
        );
        return apply_filters( 'travelism_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'travelism_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function travelism_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'travelism' ),
            'off'       => esc_html__( 'No', 'travelism' )
        );
        return apply_filters( 'travelism_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'travelism_featured_content_type' ) ) :
    /**
     * featured Options
     * @return array site featured options
     */
    function travelism_featured_content_type() {
        $travelism_featured_content_type = array(
            'page'      => esc_html__( 'Page', 'travelism' ),
            'post'      => esc_html__( 'Post', 'travelism' ),
            'category'  => esc_html__( 'Category', 'travelism' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $travelism_featured_content_type = array_merge( $travelism_featured_content_type, array(
                'trip'          => esc_html__( 'Trip', 'travelism' ),
                'trip-types'    => esc_html__( 'Trip Types', 'travelism' ),
                'destination'   => esc_html__( 'Destination', 'travelism' ),
                'activity'      => esc_html__( 'Activity', 'travelism' ),
                ) );
        }

        $output = apply_filters( 'travelism_featured_content_type', $travelism_featured_content_type );


        return $output;
    }
endif;

if ( ! function_exists( 'travelism_video_content_type' ) ) :
    /**
     * featured Options
     * @return array site featured options
     */
    function travelism_video_content_type() {
        $travelism_video_content_type = array(
            'page'      => esc_html__( 'Page', 'travelism' ),
            'post'      => esc_html__( 'Post', 'travelism' ),
            'category'  => esc_html__( 'Category', 'travelism' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $travelism_video_content_type = array_merge( $travelism_video_content_type, array(
                'trip'          => esc_html__( 'Trip', 'travelism' ),
                'trip-types'    => esc_html__( 'Trip Types', 'travelism' ),
                'destination'   => esc_html__( 'Destination', 'travelism' ),
                'activity'      => esc_html__( 'Activity', 'travelism' ),
                ) );
        }

        $output = apply_filters( 'travelism_video_content_type', $travelism_video_content_type );


        return $output;
    }
endif;

if ( ! function_exists( 'travelism_gallery_content_type' ) ) :
    /**
     * gallery Options
     * @return array site gallery options
     */
    function travelism_gallery_content_type() {
        $travelism_gallery_content_type = array(
            'post'      => esc_html__( 'Post', 'travelism' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $travelism_gallery_content_type = array_merge( $travelism_gallery_content_type, array(
                'trip'          => esc_html__( 'Trip', 'travelism' ),
                ) );
        }

        $output = apply_filters( 'travelism_gallery_content_type', $travelism_gallery_content_type );

        return $output;
    }
endif;

if ( ! function_exists( 'travelism_sortable_sections' ) ) :
    /**
     * List of sections Control options
     * @return array List of Sections control options.
     */
    function travelism_sortable_sections() {
        $sections = array(
            'hero_banner'             => esc_html__( 'Hero Banner Section', 'travelism' ),
            'northface_jacket'        => esc_html__( 'Northface Jacket Section', 'travelism' ),
            'gallery'                 => esc_html__( 'Gallery Section', 'travelism' ),
            'wildlife'                => esc_html__( 'Wildlife Section', 'travelism' ),
            'happy_clients'           => esc_html__( 'Happy Clients Section', 'travelism' ),
            'articles'                => esc_html__( 'Articles Section', 'travelism' ),
        );
        return apply_filters( 'travelism_sortable_sections', $sections );
    }
endif;

if ( ! function_exists( 'travelism_heading_tags' ) ) :
    /**
     * Destination Options
     * @return array site gallery options
     */
    function travelism_heading_tags() {
        
        $travelism_heading_tags = array(
			'h1'	=> esc_html__('H1', 'travelism'),
			'h2'	=> esc_html__('H2', 'travelism'),
			'h3'	=> esc_html__('H3', 'travelism'),
			'h4'	=> esc_html__('H4', 'travelism'),
			'h5'	=> esc_html__('H5', 'travelism'),
			'h6'	=> esc_html__('H6', 'travelism'),
			'p'		=> esc_html__('Paragraph', 'travelism'),
		);

        $output = apply_filters( 'travelism_heading_tags', $travelism_heading_tags );


        return $output;
    }
endif;