<?php
/**
 * custom engine room
 *
 * @package custom
 */

/**
 * Assign the custom version to a var
 */
$theme              = wp_get_theme( 'custom' );
$custom_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$custom = (object) array(
	'version'    => $custom_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-custom.php',
	'customizer' => require 'inc/customizer/class-custom-customizer.php',
);

require 'inc/custom-functions.php';
require 'inc/custom-template-hooks.php';
require 'inc/custom-template-functions.php';
require 'inc/wordpress-shims.php';

if ( class_exists( 'Jetpack' ) ) {
	$custom->jetpack = require 'inc/jetpack/class-custom-jetpack.php';
}

if ( custom_is_woocommerce_activated() ) {
	$custom->woocommerce            = require 'inc/woocommerce/class-custom-woocommerce.php';
	$custom->woocommerce_customizer = require 'inc/woocommerce/class-custom-woocommerce-customizer.php';

	require 'inc/woocommerce/class-custom-woocommerce-adjacent-products.php';

	require 'inc/woocommerce/custom-woocommerce-template-hooks.php';
	require 'inc/woocommerce/custom-woocommerce-template-functions.php';
	require 'inc/woocommerce/custom-woocommerce-functions.php';
}

if ( is_admin() ) {
	$custom->admin = require 'inc/admin/class-custom-admin.php';

	require 'inc/admin/class-custom-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-custom-nux-admin.php';
	require 'inc/nux/class-custom-nux-guided-tour.php';
	require 'inc/nux/class-custom-nux-starter-content.php';
}

//  Custom

function custom_styles(){ 

    // Load all of the styles that need to appear on all pages
    wp_enqueue_style('owlcss', get_stylesheet_directory_uri() . '/base_html/www/css/owl.carousel.min.css' );
    wp_enqueue_style('custom', get_stylesheet_directory_uri() . '/base_html/www/css/styles.css' );
    // wp_enqueue_script('customjq', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js','','',true);
    wp_enqueue_script('customacc', get_stylesheet_directory_uri().'/base_html/www/js/acc.js','','',true);
    wp_enqueue_script('owljs', get_stylesheet_directory_uri().'/base_html/www/js/owl.carousel.min.js','','',true);
    wp_enqueue_script('customjs', get_stylesheet_directory_uri().'/base_html/www/js/all.js','','',true);
    wp_enqueue_script('wc-add-to-cart-variation');
}
add_action('wp_enqueue_scripts', 'custom_styles');

// Create post types


function custom_posttype_brands() {  
    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Brands', 'Post Type General Name', 'storefront' ),
        'singular_name'       => _x( 'Brand', 'Post Type Singular Name', 'storefront' ),
        'menu_name'           => __( 'Brands', 'storefront' ),
        'parent_item_colon'   => __( 'Parent Brand', 'storefront' ),
        'all_items'           => __( 'All Brands', 'storefront' ),
        'view_item'           => __( 'View Brand', 'storefront' ),
        'add_new_item'        => __( 'Add New Brand', 'storefront' ),
        'add_new'             => __( 'Add New', 'storefront' ),
        'edit_item'           => __( 'Edit Brand', 'storefront' ),
        'update_item'         => __( 'Update Brand', 'storefront' ),
        'search_items'        => __( 'Search Brand', 'storefront' ),
        'not_found'           => __( 'Not Found', 'storefront' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'storefront' ),
    );
      
    // Set other options for Custom Post Type
      
    $args = array(
        'label'               => __( 'brands', 'storefront' ),
        'description'         => __( 'Petrange brands', 'storefront' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'category' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
      
    // Registering your Custom Post Type
    register_post_type( 'brands', $args );
  
}


// --------
//  Custom
// --------

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
  
add_action( 'init', 'custom_posttype_brands', 0 );

// ACF Add options page

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page();
    
}

// Custom Menu regions

function custom_custom_new_menu() {
  register_nav_menus(
    array(
      'top-menu' => __( 'Top menu on red banner' ),
      'main-menu' => __( 'Primary menu on black bar' ),
      'mega-menu' => __( 'Main dropdown mega menu' ),
      'footer-menu-1' => __( 'Footer menu 1' ),
      'footer-menu-2' => __( 'Footer menu 2' ),
      'footer-menu-3' => __( 'Footer menu 3' ),
      'footer-menu-4' => __( 'Footer menu 4' )
    )
  );
}
add_action( 'init', 'custom_custom_new_menu' );

/**
 * Returns product price based on sales.
 * 
 * @return string
 */
function custom_price_show() {
    global $product;
    if( $product->is_on_sale() ) {
        return $product->get_sale_price();
    }
    return $product->get_regular_price();
}

add_action( 'wp_enqueue_scripts', 'custom_dequeue_stylesandscripts_select2', 100 );
 
function custom_dequeue_stylesandscripts_select2() {
    if ( class_exists( 'woocommerce' ) ) {
        wp_dequeue_style( 'selectWoo' );
        wp_deregister_style( 'selectWoo' );
 
        wp_dequeue_script( 'selectWoo');
        wp_deregister_script('selectWoo');
    } 
} 

add_filter( 'yith_wcwl_remove_hidden_products_via_query', '__return_false' );


//Remove product Zoom
function remove_image_zoom_support() {
remove_theme_support( 'wc-product-gallery-zoom' );
remove_theme_support( 'wc-product-gallery-lightbox' );
}
add_action( 'wp', 'remove_image_zoom_support', 100 );

add_filter( 'woocommerce_single_product_image_thumbnail_html', 'custom_remove_product_link' );
function custom_remove_product_link( $html ) {
  return strip_tags( $html, '<div><img>' );
}

/**
 * @snippet       Remove Dashboard from My Account
 
 */
// remove menu link
add_filter( 'woocommerce_account_menu_items', 'custom_remove_my_account_dashboard' );
function custom_remove_my_account_dashboard( $menu_links ){
    
    unset( $menu_links[ 'dashboard' ] );
    return $menu_links;
    
}

// perform a redirect
add_action( 'template_redirect', 'custom_redirect_to_orders_from_dashboard' );
function custom_redirect_to_orders_from_dashboard(){
    
    if( is_account_page() && empty( WC()->query->get_current_endpoint() ) ){
        wp_safe_redirect( wc_get_account_endpoint_url( 'orders' ) );
        exit;
    }
    
}

// Check weight
add_action('woocommerce_check_cart_items','check_cart_weight');

function check_cart_weight(){
    global $woocommerce;
    $weight = $woocommerce->cart->cart_contents_weight;
    if( $weight > 15 ){
        wc_add_notice( sprintf( __( 'You have %sKg weight and we allow only 15Kg of weight per order.', 'woocommerce' ), $weight ), 'error' );
    }
}

// Add Custom Page in My Account
add_filter( 'woocommerce_account_menu_items', function ( $items, $endpoints ) {
    $items['favourites'] = 'Favourites'; // Change '/favourites' to 'favourites'
	$items['credits'] = 'Credits';
    return $items;
}, 10, 2 );

add_filter( 'woocommerce_get_endpoint_url', function ( $url, $endpoint, $value, $permalink ) {
    if ( $endpoint === 'favourites' ) { // Change '/favourites' to 'favourites'
        $url = home_url( '/favourites' );
    }
	if ( $endpoint === 'credits' ) {
        $url = home_url( '/credits' );
    }
    return $url;
}, 10, 4 );


// Reorder My Account Menu Links
add_filter( 'woocommerce_account_menu_items', 'custom_menu_links_reorder' );

function custom_menu_links_reorder( $menu_links ){
    
    return array(
        'orders' => __( 'Orders', 'woocommerce' ),
        'Favourites' => __( 'Favourites', 'woocommerce' ),
        'edit-address' => __( 'Addresses', 'woocommerce' ),
        // 'edit-payment-details' => __( 'Payment details', 'woocommerce' ),
        'payment-methods' => __( 'Payment Methods', 'woocommerce' ),
        'edit-account' => __( 'Account details', 'woocommerce' ),
		'credits' => __( 'Credits', 'woocommerce' ),
        'customer-logout' => __( 'Logout', 'woocommerce' )
    );

}


/*----------------------------------------------------------------------------------------*/
/* WooCommerce Cart Page - set minimum order amount to £15 and maximum order amount to £250
/*----------------------------------------------------------------------------------------*/
add_action( 'woocommerce_checkout_process', 'wc_min_max_order_amount' );
add_action( 'woocommerce_before_cart' , 'wc_min_max_order_amount' );

function wc_min_max_order_amount() {
    $minimum = 15; // set this variable to specify a minimum order value
    $maximum = 250; // set this variable to specify a maximum order value
    $cart_total = WC()->cart->total; // cart total including shipping
    $shipping_total = WC()->cart->get_shipping_total();  // cost of shipping
	$shipping_taxes = WC()->cart->get_shipping_taxes();
	$total_shipping_taxes = array_sum($shipping_taxes);
	$total_shipping = $shipping_total + $total_shipping_taxes;
    $cart_subtotal = WC()->cart->subtotal;  // cart total excluding shipping

    if ( ($cart_total - $total_shipping) < $minimum ) {
        if( is_cart() ) {
            wc_print_notice( 
                sprintf( 'Your current order total is %s — you must have an order with a minimum of %s to place your order.' , 
                    wc_price( $cart_total - $total_shipping ), 
                    wc_price( $minimum )
                ), 'error' 
            );
            // JavaScript to hide the element with class "wc-proceed-to-checkout"
            ?>
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function() {
                    var proceedToCheckout = document.querySelector('.wc-proceed-to-checkout');
                    if (proceedToCheckout) {
                        proceedToCheckout.style.display = 'none';
                    }
                });
            </script>
            <?php
        } else {
            wc_add_notice( 
                sprintf( 'Your current order total is %s — you must have an order with a minimum of %s to place your order.' , 
                    wc_price( $cart_total - $total_shipping ), 
                    wc_price( $minimum )
                ), 'error' 
            );
            // JavaScript to hide the element with class "wc-proceed-to-checkout"
            ?>
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function() {
                    var proceedToCheckout = document.querySelector('#payment');
                    if (proceedToCheckout) {
                        proceedToCheckout.style.display = 'none';
                    }
                });
            </script>
            <?php
        }
    }

    elseif ( ($cart_total - $total_shipping) > $maximum ) {
        if( is_cart() ) {
            wc_print_notice( 
                sprintf( 'Your order value is %s. We do not currently accept online order values of over %s.' , 
                    wc_price( $cart_total - $total_shipping ), 
                    wc_price( $maximum )
                ), 'error' 
            );
            // JavaScript to hide the element with class "wc-proceed-to-checkout"
            ?>
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function() {
                    var proceedToCheckout = document.querySelector('.wc-proceed-to-checkout');
                    if (proceedToCheckout) {
                        proceedToCheckout.style.display = 'none';
                    }
                });
            </script>
            <?php
        } else {
            wc_add_notice( 
                sprintf( 'Your order value is %s. We do not currently accept online order values of over %s.' , 
                    wc_price( $cart_total - $total_shipping ), 
                    wc_price( $maximum )
                ), 'error' 
            );
            // JavaScript to hide the element with class "wc-proceed-to-checkout"
            ?>
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function() {
                    var proceedToCheckout = document.querySelector('#payment');
                    if (proceedToCheckout) {
                        proceedToCheckout.style.display = 'none';
                    }
                });
            </script>
            <?php
        }
    }
}

//  CART | CHECKOUT
function vetrange_check_cart_total() {
    $min_price = 15;
    $max_price = 250;
	$shipping_total = WC()->cart->get_shipping_total();  // cost of shipping
	$shipping_taxes = WC()->cart->get_shipping_taxes();
	$total_shipping_taxes = array_sum($shipping_taxes);
	$total_shipping = $shipping_total + $total_shipping_taxes;
	$cart_total_value = WC()->cart->total - $total_shipping;
	$total =  wc_price($cart_total_value);
	$notice = '';
	if ($min_price && $cart_total_value < $min_price) {
		$price = wc_price($min_price);
		$notice .= sprintf('Your current order total is %1s — you must have an order with a minimum of %2s to place your order.', $total, $price);
	}
	
	if ($max_price && $cart_total_value > $max_price) {
		$price = wc_price($max_price);
		$notice .= sprintf('Your order value is %1s. We do not currently accept online order values of over %2s.', $total, $price);
	}

	wp_send_json_success(array('notice' => $notice));
}
add_action('wp_ajax_vetrange_check_cart_total', 'vetrange_check_cart_total');
add_action('wp_ajax_nopriv_vetrange_check_cart_total', 'vetrange_check_cart_total');

// add_action( 'woocommerce_cart_item_removed' , 'wc_min_max_order_amount', 10, 2 );


// WooCommerce - remove other shipping options if Free Shipping is available
// add_filter('woocommerce_package_rates', 'hide_shipping_when_free_is_available', 10, 2);
function hide_shipping_when_free_is_available($rates, $package) {
    // Check if free shipping is available in the rates
    $free_shipping_available = false;
    
    foreach ($rates as $rate_id => $rate) {
        if ('free_shipping' === $rate->method_id) {
            $free_shipping_available = true;
            break;
        }
    }
    
    if ($free_shipping_available) {
        // Unset other shipping methods
        foreach ($rates as $rate_id => $rate) {
            if ('free_shipping' !== $rate->method_id) {
                unset($rates[$rate_id]);
            }
        }
    }
    
    return $rates;
}


// WooCommerce - Product Variation - remove "Choose an option" completely
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'filter_dropdown_option_html', 12, 2 );
function filter_dropdown_option_html( $html, $args ) {
    $show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' );
    $show_option_none_html = '<option value="">' . esc_html( $show_option_none_text ) . '</option>';
    $html = str_replace($show_option_none_html, '', $html);
    return $html;
}


// Shop Page and Category Pages - custom product variation buttons for variable products
add_filter( 'woocommerce_loop_add_to_cart_link', 'woo_display_variation_dropdown_on_shop_page' );

function woo_display_variation_dropdown_on_shop_page() {
	global $product;
	if ( $product->is_type( 'variable' )) { ?>
		<form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo htmlspecialchars( json_encode( $product->get_available_variations() ) ) ?>">
			<?php do_action( 'woocommerce_before_variations_form' ); ?>
			<?php if ( empty( $product->get_available_variations() ) && false !== $product->get_available_variations() ) : ?>
				<p class="stock out-of-stock"><?php _e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>
			<?php else : ?>
				<table class="variations" cellspacing="0" style="display: none;">
					<tbody>
						<?php foreach ( $product->get_variation_attributes() as $attribute_name => $options ) : ?>
							<tr>
								<td class="value">
                                    <?php
                                        $selected = isset($_REQUEST["attribute_" . sanitize_title($attribute_name)])
                                            ? wc_clean(
                                                urldecode($_REQUEST["attribute_" . sanitize_title($attribute_name)])
                                            )
                                            : $product->get_variation_default_attribute($attribute_name);
                                        wc_dropdown_variation_attribute_options([
                                            "options" => $options,
                                            "attribute" => $attribute_name,
                                            "product" => $product,
                                            "selected" => $selected,
                                        ]);
                                    ?>
								</td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
                <?php 
                    $variations = $product->get_available_variations();
                    echo '<div class="variation-options-wrapper">';
                    echo '<div class="variation-options">';
                    foreach ( $variations as $variation ) {
                        $variation_id = $variation['variation_id'];
                        $variation_data = wc_get_product( $variation_id );
                        $regular_price = $variation_data->get_regular_price();
                        $sale_price = $variation_data->get_sale_price();
                        $price = $variation_data->get_price();
                        $attributes = implode( ' / ', $variation['attributes'] );

                        echo '<a href="#"><span class="variation-label">' . esc_html( $attributes ) . '</span>';
                        if ( $regular_price !== $price ) {
                            echo '<span class="variation-price"><span class="custom-price">';
                            echo '<span class="variation-regular-price">' . wc_price( $regular_price ) . '</span>';
                            echo '<span class="variation-sale-price">' . wc_price( $sale_price ) . '</span>';
                            echo '</span></span>';
                        }
                        else {
                            echo '<span class="variation-price">' . wc_price( $price ) . '</span></a>';
                        }
                    }
                    echo '</div></div>';
                ?>
				<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
				<div class="single_variation_wrap">
                    <?php
                        /**
                         * Hook: woocommerce_before_single_variation.
                         */
                        do_action( 'woocommerce_before_single_variation' );

                        /**
                         * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
                         *
                         * @since 2.4.0
                         * @hooked woocommerce_single_variation - 10 Empty div for variation data.
                         * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
                         */
                        do_action( 'woocommerce_single_variation' );

                        /**
                         * Hook: woocommerce_after_single_variation.
                         */
                        do_action( 'woocommerce_after_single_variation' );
                    ?>
				</div>
				<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
			<?php endif; ?>
			<?php do_action( 'woocommerce_after_variations_form' ); ?>
		</form>
	<?php }
    else {
        $html = '<a href="' . esc_url( $product->add_to_cart_url() ) . '" 
            data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" 
            data-product_id="' . $product->get_id() . '" data-product_sku="' . $product->get_sku() .'">' . esc_html( $product->add_to_cart_text() ) . '</a>';
        return $html;
    }
}


// Shop Page and Category Pages - pre-select products in stock
function filter_woocommerce_dropdown_variation_attribute_options_args( $args ) {
    // Check the count of available options in dropdown
    if ( count( $args['options'] ) > 0 ) {
        // Initialize
        $option_key = '';

        // Get WC_Product_Variable Object
        $product = $args['product'];

        // Is a WC Product Variable
        if ( is_a( $product, 'WC_Product_Variable' ) ) {
            // Get an array of available variations for the current product
            foreach ( $product->get_available_variations() as $key => $variation ) {
                // Is in stock
                $is_in_stock = $variation['is_in_stock'];

                // True
                if ( $is_in_stock ) {
                    // Set key
                    $option_key = $key;

                    // Break
                    break;
                }
            }
        }

        // Finds whether a variable is a number
        if ( is_numeric( $option_key ) ) {
            // Selected
            $args['selected'] = $args['options'][$option_key];
        }
    }

    return $args;
}
add_filter( 'woocommerce_dropdown_variation_attribute_options_args', 'filter_woocommerce_dropdown_variation_attribute_options_args', 10, 1 );


// // make website exclusive to whitelisted IP addresses
// add_action('init', 'restrict_access_by_ip');

// function restrict_access_by_ip() {
//     // 3.18.12.63, 3.130.192.231, 13.235.14.237, 13.235.122.149, 18.211.135.69, 35.154.171.200, 52.15.183.38, 54.88.130.119, 54.88.130.237, 54.187.174.169, 54.187.205.235, 54.187.216.72 - Stripe Webhook
//     // 5.255.58.50, 85.199.247.218 - Pets Choice Server
//     // 51.14.23.152 - Marc Tweedie
//     // 62.232.96.106 - Anja Smith
//     // 192.168.1.126 - Anja Smith 2
//     // 109.148.124.198 - Anja 3
//     // 92.233.236.232 - Dave
//     // 77.102.214.6 - Gareth 
//     // 82.28.151.140 - Sam
//     // 2.99.133.28 - Sam 2
//     // 86.6.86.79 - Rosellen
//     // 140.228.70.43 - Harry (HYVE)
//     // 120.29.86.34 - Owen
//     // 175.176.21.184 - Owen test
//     // $allowed_ips = array('5.255.58.50', '85.199.247.218', '51.14.23.152', '82.28.151.140', '120.29.86.34');
//     $allowed_ips = array('185.249.70.2', '3.18.12.63', '3.130.192.231', '13.235.14.237', '13.235.122.149', '18.211.135.69', '35.154.171.200', '52.15.183.38', '54.88.130.119', '54.88.130.237', '54.187.174.169', '54.187.205.235', '54.187.216.72', '5.255.58.50', '85.199.247.218', '51.14.23.152', '62.232.96.106', '192.168.1.126', '109.148.124.198', '92.233.236.232', '77.102.214.6', '82.28.151.140', '2.99.133.28', '86.6.86.79', '120.29.86.34', '175.176.21.184');
//     $user_ip = $_SERVER['REMOTE_ADDR'];
    
//     if (!in_array($user_ip, $allowed_ips)) {
//         wp_die('You are not authorized to access this website.');
//     }
// }


// add 'privatepage' class on <body> if user is logged out
add_filter('body_class', 'add_privatepage_body_class');

function add_privatepage_body_class($classes) {
    // Check if the user is logged out
    if (!is_user_logged_in()) {
        // Add 'privatepage' class to the body classes array
        $classes[] = 'privatepage';
    }
    return $classes;
}


// Redirect users to Login Page if not logged in
function redirect_if_not_logged_in() {
    // Check if the user is not logged in
    if (!is_user_logged_in()) {
        // Allow access to specific URLs and their sub-paths
        $allowed_paths = array('terms', 'privacy-policy', 'login', 'wp-login.php', 'my-account', 'lost-password', 'delivery-information', 'lvs', 'lvs-thankyou');
        
        // Get the requested URL path
        $requested_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        // Get query parameters
        $query_params = $_GET;

        // Allow access to URLs with specific query parameters, such as registration confirmation
        if (isset($query_params['confirmation_key'])) {
            return; // Do not redirect if the URL contains a confirmation key
        }

        // Check if the requested path or its sub-paths are in the allowed paths array
        foreach ($allowed_paths as $allowed_path) {
            if (strpos($requested_path, $allowed_path) === 0) {
                return; // Do not redirect if the requested path starts with an allowed path
            }
        }

        // Set the URL to which the user will be redirected
        $redirect_url = 'https://vetrange.co.uk/login'; // Replace with your desired URL

        // Perform the redirection
        wp_redirect($redirect_url);
        exit;
    }
}
// Hook the function to 'template_redirect' action which runs before the template is loaded
add_action('template_redirect', 'redirect_if_not_logged_in');




// // WooCommerce Order Limit and send notification email to specific email addresses
// add_action( 'woocommerce_checkout_process', 'custom_limit_orders_per_month' );

// function custom_limit_orders_per_month() {
//     // Get current user ID
//     $current_user_id = get_current_user_id();
    
//     // Get orders count for the current month
//     $args = array(
//         'post_type'   => 'shop_order',
//         'post_status' => array_keys( wc_get_order_statuses() ),
//         'author'      => $current_user_id,
//         'date_query'  => array(
//             array(
//                 'year'  => date( 'Y' ),
//                 'month' => date( 'm' ),
//             ),
//         ),
//     );
//     $user_orders_count = count( get_posts( $args ) );

//     // Define the maximum number of orders allowed per month
//     $max_orders_per_month = 4; // Change this number to your desired limit
    
//     // If the user has reached the limit, send email notification and prevent checkout
//     if ( $user_orders_count >= $max_orders_per_month ) {
//         // Send email notification
//         $to_email = array( 'owen.caisip@petschoice.co.uk', 'owen.caisip@cloudemployee.co.uk' ); // Add the email addresses to notify
//         $subject = 'User has reached the order limit';
//         $message = 'The user with ID ' . $current_user_id . ' has reached the order limit for the current month.';
//         wp_mail( $to_email, $subject, $message );

//         // Display error message and prevent checkout
//         wc_add_notice( __( 'You have reached the maximum number of orders allowed for this month.', 'woocommerce' ), 'error' );
//         // Redirect to the cart or any other page
//         wp_redirect( wc_get_cart_url() );
//         exit;
//     } 
//     // elseif ( $user_orders_count == $max_orders_per_month - 1 ) {
//     //     // Send email notification
//     //     $to_email = array( 'owen.caisip@petschoice.co.uk', 'owen.caisip@cloudemployee.co.uk' ); // Add the email addresses to notify
//     //     $subject = 'User is making an order that reaches the limit';
//     //     $message = 'The user with ID ' . $current_user_id . ' is making an order that will reach the order limit for the current month.';
//     //     wp_mail( $to_email, $subject, $message );
//     // }
// }

// Limit user orders to 4 per month
function limit_user_orders() {
    if ( ! is_user_logged_in() ) {
        return;
    }

    // Check if already on the cart page to prevent redirection loop
    if ( is_cart() ) {
        return;
    }

    $user_id = get_current_user_id();
    $order_count = wc_get_customer_order_count( $user_id, 'month' );

    if ( $order_count >= 4 ) {
        // Redirect to cart page with a notice
        wc_add_notice( 'You have reached the maximum order limit for this month.', 'error' );
        wp_redirect( wc_get_cart_url() );
        exit;
    }
}
add_action( 'woocommerce_check_cart_items', 'limit_user_orders' );

// Send email notification to specific admin email addresses when user reaches order limit
function notify_admin_on_order_limit_reached( $order_id ) {
    $order = wc_get_order( $order_id );

    if ( ! $order ) {
        return;
    }

    $user_id = $order->get_customer_id();
    $order_count = wc_get_customer_order_count( $user_id, 'month' );

    if ( $order_count >= 4 ) {
        // Define admin email addresses
        $admin_emails = array( 'owen.caisip@petschoice.co.uk', 'owen.caisip@cloudemployee.co.uk' );
        $subject = 'User reached maximum order limit';
        $message = 'User with ID ' . $user_id . ' has reached the maximum order limit for the month.';

        // Send email to each admin
        foreach ( $admin_emails as $email ) {
            wp_mail( $email, $subject, $message );
        }
    }
}
add_action( 'woocommerce_order_status_completed', 'notify_admin_on_order_limit_reached' );

/**
 * Hide shipping rates when free shipping is available.
 */
function vetrange_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
    $free_shipping_ids = ['free_shipping:2'];
	
	foreach ( $rates as $rate_id => $rate ) {
		if ( in_array($rate_id, $free_shipping_ids ) ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'vetrange_hide_shipping_when_free_is_available', 100 );