<?php
/**
 * WordPress general hooks
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

function hello_mobili_comment_form_defaults($fields){
    if (isset($fields['fields']['author'])){
        $fields['fields']['author'] = str_replace([
            '<label',
            '<input'
        ],[
            '<label class="form-label"',
            '<input class="form-control"'
        ],$fields['fields']['author']);
    }
    if (isset($fields['fields']['email'])){
        $fields['fields']['email'] = str_replace([
            '<label',
            '<input'
        ],[
            '<label class="form-label"',
            '<input class="form-control"'
        ],$fields['fields']['email']);
    }
    if (isset($fields['fields']['url'])){
        $fields['fields']['url'] = str_replace([
            '<label',
            '<input'
        ],[
            '<label class="form-label"',
            '<input class="form-control"'
        ],$fields['fields']['url']);
    }

    if (isset($fields['comment_field'])){
        $fields['comment_field'] = str_replace([
            '<label',
            '<textarea'
        ],[
            '<label class="form-label"',
            '<textarea class="form-control"'
        ],$fields['comment_field']);
    }


    return $fields;
}

add_filter('comment_form_defaults','hello_mobili_comment_form_defaults');