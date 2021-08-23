<?php
// This file enqueues a shortcode.

defined( 'ABSPATH' ) or die( 'Direct script access disallowed.' );

add_shortcode( 'erw_widget', function( $atts ) {
    $default_atts = array('color' => 'black', 'name' => '');
    $args = shortcode_atts( $default_atts , $atts );
    $uniqid = uniqid('id');

    global $current_user;
    $display_name = $current_user ? $current_user->display_name : 'World';

    ob_start(); ?>
<script>
window.erwSettings = window.erwSettings || {};
window.erwSettings["<?= $uniqid ?>"] = {
    'color': '<?= $args["color"] ?>',
    'name': '<?= $args["name"] ? $args["name"] : $display_name ?>'
}
</script>

<div class='erw-root' data-id="<?= $uniqid ?>"></div>
<?php
    return ob_get_clean();
});