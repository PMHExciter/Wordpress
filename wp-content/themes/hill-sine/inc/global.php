<?php
//assign global
add_action('init','hill_sine_assign_global',2);
function hill_sine_assign_global(){
    global $hill_global;
    $hill_global['sidebar_position']='right_sidebar';
    $hill_global['hill_excerpt_length'] = 20;
}
//run time check global