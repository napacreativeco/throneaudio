<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/compiled/account--dashboard.css">

<div class="dashboard-title">
	<h2>Dashboard</h2>
</div>

<div class="dashboard">

    <div class="username row">
        <div>
            <h4>Username</h4>
        </div>
        <div>
            <?php echo $current_user->display_name; ?>
        </div>
    </div>


    <div class="email row">
        <div>
            <h4>E-mail</h4>
        </div>
        <div>
            <?php echo $current_user->user_email; ?>
        </div>
    </div>


    <div class="register-date row">
        <?php 
        $user_data = get_userdata($current_user->ID); 
        $date = $user_data->user_registered;
        ?>
        <div>
            <h4>
                Registered
            </h4>
        </div>
        <div>
            <?php echo date('m/d/Y', strtotime($date)); ?>
        </div>
    </div>
    
    <div class="order-count row">
        <div>
            <h4>
                Orders
            </h4>
        </div>
        <div>
            <?php echo wc_get_customer_order_count( $current_user->ID ); ?>
        </div>
    </div>

    <div class="update-info">
        <a href="/my-account/edit-account/" title="Update Details">
            Update Details
        </a>
    </div>

    <?php
        /**
         * My Account dashboard.
         *
         * @since 2.6.0
         */
        do_action( 'woocommerce_account_dashboard' );

        /**
         * Deprecated woocommerce_before_my_account action.
         *
         * @deprecated 2.6.0
         */
        do_action( 'woocommerce_before_my_account' );

        /**
         * Deprecated woocommerce_after_my_account action.
         *
         * @deprecated 2.6.0
         */
        do_action( 'woocommerce_after_my_account' );

    /* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */?>
</div>