<?php wp_nav_menu(array('theme_location'=>'ustmenu', 'menu_class'=>'logout', 'menu_id'=>'logout')); ?>

/* Change Order Status */
function changeorderstatus($order_statuses) {
    foreach($order_statuses as $key => $status) {
        if('wc-completed' === $key)
            $order_statuses['wc-on-hold'] = _x('Onay Bekleniyor', 'Order status', 'woocommerce');
        }
        return $order_statuses;
    };
add_filter('wc_order_statuses', 'changeorderstatus');