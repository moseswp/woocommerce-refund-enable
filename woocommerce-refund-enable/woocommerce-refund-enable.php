<?php
/*
Plugin Name: WooCommerce Refund Enable
Plugin URI: https://24X7wpsupport
Description: Enable the refund amount field in WooCommerce orders.
Version: 12.0
Author: Mazhar Ali
Author URI: https://24X7wpsupport
License: GPL2
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Get plugin directory path
function moses_get_plugin_dir($file = '') {
    $main_dir = dirname( __FILE__ );
    $main_dir_slashed = trailingslashit( $main_dir );
    $main_dir_final = $main_dir_slashed . $file;

    return $main_dir_final;
}

// Get plugin URL
function moses_get_plugin_url( $file = '' ) {
    return plugins_url( $file, __FILE__ );
}

// Enable refund field in WooCommerce orders
add_action('admin_head', 'ff_enable_woocommerce_refund_field', 99);

function ff_enable_woocommerce_refund_field() {
    $currentPostType = get_post_type();

    if( $currentPostType != 'shop_order' ) {
        return;
    }
    ?>
    <script>
        (function($){
            $(document).ready(function(){
                $('#refund_amount').removeAttr('readonly');
            });
        })(jQuery);
    </script>
    <?php
}
