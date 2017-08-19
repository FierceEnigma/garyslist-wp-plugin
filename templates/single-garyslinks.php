<?php
/**
 * Created by PhpStorm.
 * User: CarlosMoreira
 * Date: 7/30/2017
 * Time: 12:53 PM
 */
?>

<?php

global $wp_query;

$postid = $wp_query->post->ID;
$gl_stored_meta = get_post_meta($postid);
//var_dump($gl_stored_meta);

$content_before_table = isset($gl_stored_meta['content_before_table'][0]) ? $gl_stored_meta['content_before_table'][0] : null;
$table_url = isset($gl_stored_meta['table_url'][0]) ? $gl_stored_meta['table_url'][0] : null;
$content_after_table = isset($gl_stored_meta['content_after_table'][0]) ? $gl_stored_meta['content_after_table'][0] : null;
$right_side_ad = isset($gl_stored_meta['right_side_ad'][0]) ? $gl_stored_meta['right_side_ad'][0] : null;

?>

<?php get_header(); ?>

<?php //require_once(plugin_dir_path(__FILE__) . '/templates/css/garyslinks-styles.php'); ?>

<style>
    .gl-row {
        width: 98%;
        clear: both;
        position: relative;
        margin: 10px;
    }

    .gl-pull-left {
        float: left;
    }

    .gl-pull-right {
        float: right;
    }

    .gl-col-long {
        padding: 5px;
        width: 75%;
    }

    .gl-col-sm {
        padding: 5px;
        width: 25%;
    }

    .gl-clear-fix {
        clear: both;
    }

    #gl-menu {
        text-align: center;
    }

    #gl-menu ul {
        list-style: none;
        background-color: #444;
        text-align: center;
        padding: 0;
        margin: 0;
    }

    #gl-menu li {
        font-family: 'Oswald', sans-serif;
        font-size: 1.2em;
        line-height: 40px;
        height: 40px;
        border-bottom: 1px solid #888;
    }

    #gl-menu a {
        text-decoration: none;
        color: #fff;
        display: block;
        transition: .3s background-color;
    }

    #gl-menu a:hover {
        background-color: #fff;
        color: black;
    }

    #gl-menu a.active {
        background-color: #005f5f;
        color: white;
        cursor: default;
    }

    @media screen and (min-width: 600px) {
        #gl-menu li {
            width: 120px;
            border-bottom: none;
            height: 50px;
            line-height: 50px;
            font-size: 1.4em;
        }

        /* Option 1 - Display Inline */
        #gl-menu li {
            display: inline-block;
            margin-right: -4px;
        }

        /* Options 2 - Float
        #gl-menu li {
          float: left;
        }
        #gl-menu ul {
          overflow: auto;
          width: 600px;
          margin: 0 auto;
        }
        #gl-menu {
          background-color: #444;
        }
        */
    }

</style>

<script type="text/javascript">
    function ResizeIframe(Obj) {
        setTimeout(function(){
            Obj.style.height = 0;
            Obj.style.height = Obj.contentWindow.document.body.scrollHeight + 'px';
            console.log(Obj.contentWindow.document.body.scrollHeight + 'px');
        }, 2500);
    }
</script>

<?php if(get_option('glSelectedMenuId')):?>
    <?php $menus = wp_get_nav_menu_items(get_option('glSelectedMenuId'));
       // var_dump($menus);
    ?>
    <div id="gl-menu">
        <ul>
            <?php foreach($menus as $menu): ?>
                <li>
                    <a
                            <?php echo (get_queried_object_id() == $menu->object_id) ? 'class="active"' : '' ?>
                            href="<?php echo $menu->url;?>">
                        <?php echo $menu->title;?>
                    </a>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
<?php endif; ?>

<?php if ($content_before_table && $content_before_table != ''): ?>
    <div class="gl-row" id="gl-topContent">
        <?php echo $content_before_table; ?>
    </div>
<?php endif; ?>

<div class="gl-row" id="gl-table">
    <div class="gl-col-long gl-pull-left">
        <iframe src="<?php echo get_site_url();?>/wp-content/plugins/garyslist/iframeloader.php?url=<?php echo $table_url; ?>"
                width="100%"
                height="100%"
                frameborder="1"
                scrolling="no"
                onload="ResizeIframe(this)"
                >
        </iframe>
    </div>
    <div class="gl-col-sm gl-pull-left">

        <?php echo $right_side_ad; ?>
    </div>
</div>

<div class="gl-clear-fix"></div>

<?php if ($content_after_table && $content_after_table != ''): ?>
    <div class="gl-row" id="gl-bottomContent">
        <?php echo $content_after_table ?>
    </div>
<?php endif; ?>

<?php get_footer(); ?>
