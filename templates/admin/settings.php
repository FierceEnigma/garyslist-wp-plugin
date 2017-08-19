<?php
    $menus = get_terms( 'nav_menu', array( 'hide_empty' => false ));
    $glSelectedMenuId = (get_option('glSelectedMenuId')) ? get_option('glSelectedMenuId') : '';
    $glTablesApiUrl = (get_option("glTablesApiUrl")) ? get_option("glTablesApiUrl"): '';
?>

<style>
    #gl-settings-page input[type='text']{
        width:80%;
        padding:3px;
    }
</style>
<div id="gl-settings-page">
    <h2>Garys Links Settings</h2>
    <form action="" method="POST">

        <fieldset>
            <label for="tablesApiUrl">
                <strong>Table Api Url:</strong>
            </label>
            <br>
            <input id="tablesApiUrl" type="text"
           value="<?php echo $glTablesApiUrl; ?>" name="glTablesApiUrl" required>
        </fieldset>

        <fieldset>
            <label for="glMenuView">
                <strong>Menu:</strong>
            </label>
            <br>
            <select name="glSelectedMenuId" id="glMenuView">
                <option value="">:: SELECT ::</option>
                <?php foreach ($menus as $menu):?>
                    <option value="<?php echo $menu->term_id; ?>"
                        <?php if($glSelectedMenuId == $menu->term_id):?>
                            selected
                        <?php endif;?>>
                        <?php echo $menu->name; ?>
                    </option>
                <?php endforeach;?>
            </select>
        </fieldset>

        <br>
        <hr>
        <br>

        <fieldset>
            <input type="submit" value="Save Settings">
        </fieldset>

    </form>

    <br>
    <hr>

    <?php if($glTablesApiUrl != ''):?>
        <iframe style="width:98%; height: 700px;"
                src="<?php echo get_option('glTablesApiUrl')?>/dashboard" frameborder="0"></iframe>
    <?php else:?>
        <p>
            <i>Please add Table Api Url Above.</i>
        </p>
    <?php endif;?>
</div>

<?php
if (isset($_POST["glTablesApiUrl"])) {
    $glTablesApiUrl = $_POST["glTablesApiUrl"];
    update_option("glTablesApiUrl", $glTablesApiUrl);
}

if (isset($_POST["glSelectedMenuId"])) {
    $glSelectedMenuId = $_POST["glSelectedMenuId"];
    update_option("glSelectedMenuId", $glSelectedMenuId);
}
?>