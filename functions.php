<?php
ob_start();
function byshirts_setup() {
    add_theme_support('woocommerce');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    register_nav_menu( 'primary', __('Main Menu', 'byshirts') );
    register_nav_menu('ustmenu', __('Üst Menü', 'byshirts'));
    add_theme_support( "post-thumbnails" );
    set_post_thumbnail_size( 250, 340, true );
    add_filter('pre_get_posts', 'content_deleted');
}
add_action('after_setup_theme', 'byshirts_setup');

function byshirts_call_dic(){
    wp_enqueue_style('mainstyle', get_stylesheet_uri(), array());
    wp_enqueue_style('responsivestyle', get_template_directory_uri() . '/css/responsive.css', array());
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', array());
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array('jquery'), true );
    wp_enqueue_script( 'fontawesome', 'https://kit.fontawesome.com/114cf4f071.js', array('jquery'), true );
    add_editor_style( array('css/editor-style.css', 'genericons/genericons.css') );
}
add_action('wp_enqueue_scripts', 'byshirts_call_dic');

function content_deleted($query) {
    if ( $query->is_home() ) {
    $query->set('cat', '-39');
    }
    return $query;
}
   
/*ACF*/
add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path( $path ) {
    $path = get_stylesheet_directory() . '/inc/acf/';
    return $path;
}

add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir( $dir ) {
    $dir = get_stylesheet_directory_uri() . '/inc/acf/';
    return $dir;
    
}

//add_filter('acf/settings/show_admin', '__return_false');

include_once( get_stylesheet_directory() . '/inc/acf/acf.php' );

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point( $path ) {
    $path = get_stylesheet_directory() . '/inc/acfsettings/';
    return $path;
    
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Site Ayarları',
		'menu_title'	=> 'Site Ayarları',
		'menu_slug' 	=> 'site-ayarlari',
		'capability'	=> 'manage_options',
		'redirect'		=> false
	));
	
	acf_add_options_page(array(
		'page_title' 	=> 'Ana Sayfa Ayarları',
		'menu_title'	=> 'Ana Sayfa Ayarları',
		'menu_slug' 	=> 'anasayfa-ayarlari',
		'parent_slug'	=> 'site-ayarlari',
		'capability'	=> 'manage_options',
		'redirect'		=> false
	));
		
}

function byshirts_cart($products) {
    ob_start();
    ?>
    <span class="current-cart">
    <a style="color:#1e2a3d" href="<?php echo wc_get_cart_url(); ?>"> Sepetinizde şuan <b><?php echo WC()->cart->cart_contents_count; ?></b> ürün var <b><?php echo WC()->cart->get_cart_total(); ?></b></a></span>
    <?php
    $products['.current-cart'] = ob_get_clean();
    return $products;
}
add_filter('woocommerce_add_to_cart_fragments', 'byshirts_cart');
function byshirts_product_detail_container_1(){
    ?>
    <div class="container">
        <div class="row">
    
    <?php
}
add_action('woocommerce_before_main_content', 'byshirts_product_detail_container_1');

function byshirts_product_detail_container_2(){
    ?>
        </div>
    </div>
    
    <?php
}
add_action('woocommerce_after_main_content', 'byshirts_product_detail_container_2');

function remove_sidebar() {
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
}
add_action('wp', 'remove_sidebar');

function cart_update(){
    if(is_cart()){
        ?>
        <script type="text/javascript">
        jQuery('div.woocommerce').on('click', "input.qty", function(){
            jQuery("[name='update_cart']").trigger("click");
        })
        </script>
        <?php
    }
}
add_action('wp_footer', 'cart_update');

/* New Order Status */
function neworderstatus($order_statuses) {
    $order_statuses['wc-shipping'] = array(
        'label' => _x('Kargolandı', 'Order status', 'woocommerce'),
        'public' => false,
        'exclude_from_search' => false,
        'show_in_admin_all_list' => true,
        'show_in_admin_status_list' => true,
    );
return $order_statuses;
}
add_filter('woocommerce_register_shop_order_post_statuses', 'neworderstatus');
function neworderstatusadd($order_statuses) {
    $order_statuses['wc-shipping'] = _x('Ürün Kargolandı', 'Order status', 'woocommerce');
    return $order_statuses;
}
add_filter('wc_order_statuses', 'neworderstatusadd');
function neworderstatusadd2($bulk_actions) {
    $bulk_actions['mark_shipping'] = 'Mevcut Siparişi Kargolandı Olarak Değiştir';
    return $bulk_actions;
}
add_filter('bulk_actions-edit-shop_order', 'neworderstatusadd2');

/*admin ve login stiller*/
add_action('admin_head', 'admin_style');
function admin_style() {
include ("style-admin.php"); 
} 

function login_style() { 
include ("style-login.php"); 
}
add_action( 'login_enqueue_scripts', 'login_style' );

add_filter('admin_title', 'panel_basligi', 10, 2);
function panel_basligi($admin_title, $title)
{
    return get_bloginfo('name').' &bull; '.$title;
}

function login_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'login_url' );


function login_url_baslik() {
    return get_bloginfo('name').' Yönetim Paneli';
}
add_filter( 'login_headertitle', 'login_url_baslik' );

function favicon_ekler() {
	$favicon = get_field('favicon', 'option'); 
	echo '<link rel="shortcut icon" href="'. $favicon['url'].' " type="image/x-icon"/>';
	
}
add_action('login_head', 'favicon_ekler');
add_action('admin_head', 'favicon_ekler');
?>