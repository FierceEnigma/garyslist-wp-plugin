<?php
/**
 * Created by PhpStorm.
 * User: CarlosMoreira
 * Date: 8/1/2017
 * Time: 9:41 PM
 */


function garysList_table_shortcode($atts, $content = null)
{

    if (!isset($atts['id']))
        return "<p>[Please add table 'id' to shortcode]</p>";

    $posts = get_post(96);

    $content = require_once(plugin_dir_path(__FILE__) . '/templates/garyslist-shortcode-template.php');

    return $content;
}

add_shortcode('garyslist-table', 'garysList_table_shortcode');