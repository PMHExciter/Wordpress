<?php
/**
* Partial functions
* @package Theme Palace
* @subpackage Travelism
* @since Travelism 1.0.0
*/

if ( ! function_exists( 'travelism_contact_number_partial' ) ) :
    // contact_number
    function travelism_contact_number_partial() {
        $options = travelism_get_theme_options();
        return esc_html( $options['contact_number'] );
    }
endif;

if ( ! function_exists( 'travelism_copyright_text_partial' ) ) :
    // copyright_text
    function travelism_copyright_text_partial() {
        $options = travelism_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;

if ( ! function_exists( 'travelism_hero_banner_sub_title_partial' ) ) :
    // hero_banner_sub_title
    function travelism_hero_banner_sub_title_partial() {
        $options = travelism_get_theme_options();
        return esc_html( $options['hero_banner_sub_title'] );
    }
endif;

if ( ! function_exists( 'travelism_hero_banner_btn_title_partial' ) ) :
    // hero_banner_btn_title
    function travelism_hero_banner_btn_title_partial() {
        $options = travelism_get_theme_options();
        return esc_html( $options['hero_banner_btn_title'] );
    }
endif;

if ( ! function_exists( 'travelism_northface_jacket_sub_title_partial' ) ) :
    // northface_jacket_sub_title
    function travelism_northface_jacket_sub_title_partial() {
        $options = travelism_get_theme_options();
        return esc_html( $options['northface_jacket_sub_title'] );
    }
endif;

if ( ! function_exists( 'travelism_northface_jacket_title_partial' ) ) :
    // northface_jacket_title
    function travelism_northface_jacket_title_partial() {
        $options = travelism_get_theme_options();
        return esc_html( $options['northface_jacket_title'] );
    }
endif;

if ( ! function_exists( 'travelism_wildlife_sub_title_partial' ) ) :
    // wildlife_sub_title
    function travelism_wildlife_sub_title_partial() {
        $options = travelism_get_theme_options();
        return esc_html( $options['wildlife_sub_title'] );
    }
endif;

if ( ! function_exists( 'travelism_wildlife_btn_label_partial' ) ) :
    // wildlife_btn_label
    function travelism_wildlife_btn_label_partial() {
        $options = travelism_get_theme_options();
        return esc_html( $options['wildlife_btn_label'] );
    }
endif;


if ( ! function_exists( 'travelism_gallery_sub_title_partial' ) ) :
    // gallery_sub_title
    function travelism_gallery_sub_title_partial() {
        $options = travelism_get_theme_options();
        return esc_html( $options['gallery_sub_title'] );
    }
endif;


if ( ! function_exists( 'travelism_gallery_title_partial' ) ) :
    // gallery_title
    function travelism_gallery_title_partial() {
        $options = travelism_get_theme_options();
        return esc_html( $options['gallery_title'] );
    }
endif;

if ( ! function_exists( 'travelism_gallery_btn_label_partial' ) ) :
    // gallery_btn_label
    function travelism_gallery_btn_label_partial() {
        $options = travelism_get_theme_options();
        return esc_html( $options['gallery_btn_label'] );
    }
endif;



if ( ! function_exists( 'travelism_happy_clients_section_sub_title_partial' ) ) :
    // happy_clients_section_sub_title
    function travelism_happy_clients_section_sub_title_partial() {
        $options = travelism_get_theme_options();
        return esc_html( $options['happy_clients_section_sub_title'] );
    }
endif;

if ( ! function_exists( 'travelism_happy_clients_section_title_partial' ) ) :
    // happy_clients_section_title
    function travelism_happy_clients_section_title_partial() {
        $options = travelism_get_theme_options();
        return esc_html( $options['happy_clients_section_title'] );
    }
endif;

if ( ! function_exists( 'travelism_articles_sub_title_partial' ) ) :
    // articles_sub_title
    function travelism_articles_sub_title_partial() {
        $options = travelism_get_theme_options();
        return esc_html( $options['articles_sub_title'] );
    }
endif;

if ( ! function_exists( 'travelism_articles_title_partial' ) ) :
    // articles_title
    function travelism_articles_title_partial() {
        $options = travelism_get_theme_options();
        return esc_html( $options['articles_title'] );
    }
endif;