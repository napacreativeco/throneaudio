<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/compiled/checkout.css">

<div class="checkout-page">

    <!-- 
    LEFT
    -->
    <div class="left">

        <?php get_header('checkout'); ?>

        <!-- Order Review (Mobile) -->
        <details class="mobile">
            <summary>
                <div>
                    <p>Show order summary</p>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" focusable="false" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m11.9 5.6-4.653 4.653a.35.35 0 0 1-.495 0L2.1 5.6"></path>
                    </svg>
                </div>
                
                <div>
                    <div><?php wc_cart_totals_order_total_html(); ?></div>
                </div>
            </summary>

            <div class="details-body">
                <?php get_template_part('template-parts/checkout-shop-table'); ?>
            </div>

        </details>

        <!-- Form -->
        <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data" aria-label="<?php echo esc_attr__( 'Checkout', 'woocommerce' ); ?>">

            <div class="form-fields">

                <?php if ( $checkout->get_checkout_fields() ) : ?>

                    <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

                        <div class="col2-set" id="customer_details">

                            <!-- BILLING -->
                            <div class="col-1">
                                <?php do_action( 'woocommerce_checkout_billing' ); ?>
                            </div>

                            <!-- SHIPPING -->
                            <div class="col-2">
                                <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                            </div>

                        </div>

                    <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

                <?php endif; ?>
            </div>

            <!-- REVIEW -->
            <div class="review-container review-container">
                
                <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                    </div>

                <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
            </div>

        </form>
    </div>

    <!-- 
    RIGHT
    -->
    <div class="right">
        <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
                
        <h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
        <?php get_template_part('template-parts/checkout-shop-table'); ?>     
    </div>
</div>


<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>