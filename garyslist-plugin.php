<?php
/*
Plugin Name: Garys List
Description: Show tables from garys list api
*/
/* Start Adding Functions Below this Line */

// Our custom post type function

/*
* Creating a function to create our CPT
*/

require_once(plugin_dir_path(__FILE__) . 'garyslist-cpt.php');
require_once(plugin_dir_path(__FILE__) . 'garyslist-meta.php');
require_once(plugin_dir_path(__FILE__) . 'garyslist-templates.php');
require_once(plugin_dir_path(__FILE__) . 'garyslist-shortCode.php');

function gl_add_settings_submenu_page(){
    add_submenu_page(
            'edit.php?post_type=garyslinks',
            'GL - Settings',
        'Settings',
            'manage_options',
            'settings_gl',
            'gl_settings_template'
    );
}
function gl_settings_template(){
    require_once(plugin_dir_path(__FILE__) . '/templates/admin/settings.php');
}

add_action('admin_menu', 'gl_add_settings_submenu_page');

?>