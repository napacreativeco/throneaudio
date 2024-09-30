<?php
/**
 * My Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

defined( 'ABSPATH' ) || exit;

$customer_id = get_current_user_id();

if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing'  => __( 'Billing address', 'woocommerce' ),
			'shipping' => __( 'Shipping address', 'woocommerce' ),
		),
		$customer_id
	);
} else {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing' => __( 'Billing address', 'woocommerce' ),
		),
		$customer_id
	);
}

$oldcol = 1;
$col    = 1;
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/compiled/account--addresses.css">

<div class="addresses-page">

	<div class="dashboard-title">
		<h2>Default Addresses</h2>
	</div>

	<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) : ?>
		<div class="u-columns woocommerce-Addresses col2-set addresses">
	<?php endif; ?>

	<?php foreach ( $get_addresses as $name => $address_title ) : ?>
		<?php
			$address = wc_get_account_formatted_address( $name );
			$col     = $col * -1;
			$oldcol  = $oldcol * -1;
		?>

		<section>
			<div class="addresses u-column<?php echo $col < 0 ? 1 : 2; ?> col-<?php echo $oldcol < 0 ? 1 : 2; ?> woocommerce-Address">
				<header class="woocommerce-Address-title title">

					<h4><?php echo esc_html( $address_title ); ?></h4>

					<p class="no-address"><?php echo $address ? wp_kses_post( $address ) : esc_html_e( 'You have not set up this type of address yet.', 'woocommerce' ); ?></p>

					<a class="edit-address" href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', $name ) ); ?>" class="edit">
						<?php
							printf(
								/* translators: %s: Address title */
								$address ? esc_html__( 'Edit %s', 'woocommerce' ) : esc_html__( 'Add %s', 'woocommerce' ),
								esc_html( $address_title )
							);
						?>
					</a>
				</header>
				<address>
					<?php
						/**
						 * Used to output content after core address fields.
						 *
						 * @param string $name Address type.
						 * @since 8.7.0
						 */
						do_action( 'woocommerce_my_account_after_my_address', $name );
					?>
				</address>
			</div>
		</section>

	<?php endforeach; ?>

	<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) : ?>
		</div>
		<?php
	endif;
	?>

</div>






