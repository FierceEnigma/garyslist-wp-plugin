<?php
/**
 * Created by PhpStorm.
 * User: CarlosMoreira
 * Date: 7/30/2017
 * Time: 12:59 PM
 */


function gl_get_custom_post_type_template($template) {
    global $post;
    if ($post->post_type == 'garyslinks') {
        $template = dirname( __FILE__ ) . '/templates/single-garyslinks.php';
    }
    return $template;
}
add_filter( "single_template", "gl_get_custom_post_type_template" ); //for single page