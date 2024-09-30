<?php
function throne_theme_setup() {
	
	wp_enqueue_script("jquery");
	
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
	
    register_nav_menus(
        array(
        'main-menu' => __( 'Main Menu' ),
        'footer-menu' => __( 'Footer Menu' ),
        'checkout-menu' => __( 'Checkout Menu' ),
        'mobile-menu' => __( 'Mobile Menu' ),
        'plugin-menu' => __( 'Plugin Menu' )
        )
    );
    
}
add_action( 'init', 'throne_theme_setup' );

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
   add_theme_support( 'woocommerce' );
}    


/*======================================================
 * Styles
 *======================================================*/
function throne_styles() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'styles', get_template_directory_uri() . '/compiled/throne.css' );
    wp_enqueue_script( 'throne-script', get_stylesheet_directory_uri() . '/compiled/throne.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'throne_styles' );

/*======================================================
 * Disable WooCommerce Styles
 *======================================================*/
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
/**
 * Disable WooCommerce block styles (front-end).
 */
// function themesharbor_disable_woocommerce_block_styles() {
//     wp_dequeue_style( 'wc-blocks-style' );
// }
// add_action( 'wp_enqueue_scripts', 'themesharbor_disable_woocommerce_block_styles' );

/*======================================================
 * Trim Zeros on Prices
 *======================================================*/
add_filter( 'woocommerce_price_trim_zeros', '__return_true' );

function currentYear( $atts ){
    return date('Y');
}
add_shortcode( 'year', 'currentYear' );

/*======================================================
 * Customizer External
 *======================================================*/
//include get_template_directory() . '/inc/linkboxes.php';

/*======================================================
 * Pagination
 *======================================================*/
$args = array(
    'base'               => '%_%',
    'format'             => '?paged=%#%',
    'total'              => 1,
    'current'            => 0,
    'show_all'           => false,
    'end_size'           => 1,
    'mid_size'           => 2,
    'add_args'           => false,
    'add_fragment'       => '',
    'before_page_number' => '',
    'after_page_number'  => ''
);


remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );


/*======================================================
 * Active Nav
 *======================================================*/
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}


/**
 * @snippet       Remove Sidebar @ Single Product Page
 * @how-to        Get CustomizeWoo.com FREE
 * @sourcecode    https://businessbloomer.com/?p=19572
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.2.6
 */
 
 add_action( 'wp', 'bbloomer_remove_sidebar_product_pages' );
 
 function bbloomer_remove_sidebar_product_pages() {
    if ( is_product() ) {
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
    }
 }



 /*
    Checkout Fields
 */
add_filter( 'woocommerce_checkout_fields' , 'override_billing_checkout_fields', 20, 1 );

function override_billing_checkout_fields( $fields ) {
    $fields['billing']['billing_first_name']['placeholder'] = 'First name';
    $fields['billing']['billing_last_name']['placeholder'] = 'Last name';
    $fields['billing']['billing_company']['placeholder'] = 'Company';
    $fields['billing']['billing_address_1']['placeholder'] = 'Street Address';
    $fields['billing']['billing_address_2']['placeholder'] = 'Apartment';
    $fields['billing']['billing_city']['placeholder'] = 'City';
    $fields['billing']['billing_postcode']['placeholder'] = 'Zip code';
    $fields['billing']['billing_phone']['placeholder'] = 'Phone';
    $fields['billing']['billing_email']['placeholder'] = 'Email';

    $fields['shipping']['shipping_first_name']['placeholder'] = 'First name';
    $fields['shipping']['shipping_last_name']['placeholder'] = 'Last name';
    $fields['shipping']['shipping_company']['placeholder'] = 'Company';
    $fields['shipping']['shipping_address_1']['placeholder'] = 'Street Address';
    $fields['shipping']['shipping_address_2']['placeholder'] = 'Apartment';
    $fields['shipping']['shipping_city']['placeholder'] = 'City';
    $fields['shipping']['shipping_postcode']['placeholder'] = 'Zip code';
    $fields['shipping']['shipping_phone']['placeholder'] = 'Phone';
    $fields['shipping']['shipping_email']['placeholder'] = 'Email';
    return $fields;
}



 /*
    Default Address Fields
 */
add_filter( 'woocommerce_billing_fields' , 'override_default_billing_address_fields', 20, 1 );
function override_default_billing_address_fields( $fields ) {
    $fields['billing_first_name']['placeholder'] = 'First name';
    $fields['billing_last_name']['placeholder'] = 'Last name';
    $fields['billing_company']['placeholder'] = 'Company';
    $fields['billing_address_1']['placeholder'] = 'Street Address';
    $fields['billing_address_2']['placeholder'] = 'Apartment';
    $fields['billing_city']['placeholder'] = 'City';
    $fields['billing_postcode']['placeholder'] = 'Zip code';
    $fields['billing_phone']['placeholder'] = 'Phone';
    $fields['billing_email']['placeholder'] = 'Email';
    return $fields;
}

add_filter( 'woocommerce_shipping_fields' , 'override_default_shipping_address_fields', 20, 1 );
function override_default_shipping_address_fields( $fields ) {
    $fields['shipping_first_name']['placeholder'] = 'First name';
    $fields['shipping_last_name']['placeholder'] = 'Last name';
    $fields['shipping_company']['placeholder'] = 'Company';
    $fields['shipping_address_1']['placeholder'] = 'Street Address';
    $fields['shipping_address_2']['placeholder'] = 'Apartment';
    $fields['shipping_city']['placeholder'] = 'City';
    $fields['shipping_postcode']['placeholder'] = 'Zip code';
    $fields['shipping_phone']['placeholder'] = 'Phone';
    $fields['shipping_email']['placeholder'] = 'Email';
    return $fields;
}


 /*
    ORDER AUTH
 */
// add_action('rest_api_init', function () {
//     register_rest_route('vaporreverb/v1', '/order/(?P<id>\d+)', array(
//         'methods' => 'GET',
//         'callback' => 'get_order_serial_number',
//     ));
// });

// function get_order_serial_number($data) {
//     $order_id = $data['id'];
//     $order = wc_get_order($order_id);
//     $items = $order->get_items();

//     foreach ( $items as $item ) {
//         $product_name = $item->get_name();
//         $product_id = $item->get_product_id();
//         $product_variation_id = $item->get_variation_id();
//     }
    
//     if (!$order) {
//         return new WP_Error('no_order', 'Invalid order ID', array('status' => 404));
//     }

//     // Assuming the serial number is stored in order meta
//     $serial_number = get_post_meta($order_id, '_serial_number', true);
    
//     return rest_ensure_response(array(
//         'order_id' => $order_id,
//         'serial_number' => $serial_number,
//         'product_id' =>  $product_id
//     ));
// }


add_action('rest_api_init', function () {
    register_rest_route('dlm/v1/licenses/activate/', '', array(
        'methods' => 'GET',
        'callback' => 'get_order_serial_number',
    ));
});

function get_order_serial_number($data) {
    $order = $data['success'];
    
    if ($order == false) {
        return new WP_Error('no_order', 'Invalid order ID', array('status' => 404));
    }

    // Assuming the serial number is stored in order meta
    //$serial_number = get_post_meta($order_id, '_serial_number', true);
    
    return rest_ensure_response(array(
        'success_state' => $order
    ));
}
