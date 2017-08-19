<?php
/**
 * Created by PhpStorm.
 * User: CarlosMoreira
 * Date: 7/23/2017
 * Time: 8:19 PM
 */

function gl_add_custom_metabox()
{
    add_meta_box(
        'dwwp_meta',
        'Garys Link Info',
        'gl_meta_callback',
        'garyslinks',
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'gl_add_custom_metabox');

/**
 * Add meta box
 *
 * @param post $post The post object
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
 */
function gl_meta_callback($post)
{
    wp_nonce_field(basename(__FILE__), gl_nonce);
    $hrm_stored_meta = get_post_meta($post->ID);

    ?>
    <div>

        <?php if($post->ID):?>
            <div class="meta-row">
                <h4>Post Id: <?php echo $post->ID;?></h4>
            </div>
        <?php endif;?>

        <div class="meta-row">
            <div class="meta-th">
                <label for="table_url" class="hrm-row-title"><?php _e('Table URL:', 'hrm-textdomain') ?></label>
            </div>
            <div class="meta-td">
                <input style="width:100%" type="text" name="table_url" id="table_url"
                       value="
                       <?php if (isset ($hrm_stored_meta['table_url'])) echo esc_attr($hrm_stored_meta['table_url'][0]); ?>
                        "/>
            </div>
        </div>

        <br>
        <hr>
        <br>

        <div class="meta-row">
            <div class="meta-th">
                <span>Content Before Table:</span>
            </div>
            <div class="meta-editor">
                <?php
                $content = get_post_meta($post->ID, 'content_before_table', true);
                $editor_id = 'content_before_table';
                $settings = array(
                    'textarea_rows' => 5,
                );
                wp_editor($content, $editor_id, $settings);
                ?>
            </div>
        </div>

        <br>
        <hr>
        <br>

        <div class="meta-row">
            <div class="meta-th">
                <span>Content After Table:</span>
            </div>
            <div class="meta-editor">
                <?php
                $content = get_post_meta($post->ID, 'content_after_table', true);
                $editor_id = 'content_after_table';
                $settings = array(
                    'textarea_rows' => 5,
                );
                wp_editor($content, $editor_id, $settings);
                ?>
            </div>
        </div>

        <br>
        <hr>
        <br>

        <div class="meta-row">
            <div class="meta-th">
                <label for="job-id" class="hrm-row-title">
                    <?php _e('Right Side Ad:', 'hrm-textdomain') ?>
                </label>
            </div>
            <div class="meta-td">
                <input style="width:100%" type="text" name="right_side_ad" id="job-id"
                       value="<?php if (isset ($hrm_stored_meta['right_side_ad'])) echo esc_attr($hrm_stored_meta['right_side_ad'][0]); ?>"/>
            </div>
        </div>
    </div>

    <br>
    <hr>
    <br>


    <iframe style="width:100%; height: 700px;"
        src="<?php echo get_option('glTablesApiUrl')?>/dashboard" frameborder="0"></iframe>

    <?php
}


function gl_meta_save($post_id)
{
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = (isset($_POST['gl_nonce']) && wp_verify_nonce($_POST['gl_nonce']));

    if ($is_autosave || $is_revision || $is_valid_nonce) {
        return;
    }

    if (isset($_POST['table_url'])) {
        update_post_meta($post_id, 'table_url', sanitize_text_field($_POST['table_url']));
    }

    if (isset($_POST['content_before_table'])) {
        update_post_meta($post_id, 'content_before_table', $_POST['content_before_table']);
    }

    if (isset($_POST['content_after_table'])) {
        update_post_meta($post_id, 'content_after_table', $_POST['content_after_table']);
    }

    if (isset($_POST['right_side_ad'])) {
        update_post_meta($post_id, 'right_side_ad', sanitize_text_field($_POST['right_side_ad']));
    }
}

add_action('save_post', 'gl_meta_save');