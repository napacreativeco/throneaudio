<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

defined( 'ABSPATH' ) || exit;

$notes = $order->get_customer_order_notes();
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/compiled/account--view-order.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/compiled/account--downloads.css">

<div class="view-order">

	<!-- TITLE -->
	<div class="dashboard-title">
		<h2>
			Order #<?php echo $order_id; ?> <span><?php echo wc_format_datetime( $order->get_date_created() ) ?></span>
		</h2>
	</div>

	<?php if ( $notes ) : ?>
		<h3><?php esc_html_e( 'Order updates', 'woocommerce' ); ?></h3>
		<ol class="woocommerce-OrderUpdates commentlist notes">
			<?php foreach ( $notes as $note ) : ?>
			<li class="woocommerce-OrderUpdate comment note">
				<div class="woocommerce-OrderUpdate-inner comment_container">
					<div class="woocommerce-OrderUpdate-text comment-text">
						<p class="woocommerce-OrderUpdate-meta meta"><?php echo date_i18n( esc_html__( 'l jS \o\f F Y, h:ia', 'woocommerce' ), strtotime( $note->comment_date ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
						<div class="woocommerce-OrderUpdate-description description">
							<?php echo wpautop( wptexturize( $note->comment_content ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
			</li>
			<?php endforeach; ?>
		</ol>
	<?php endif; ?>

	<?php do_action( 'woocommerce_view_order', $order_id ); ?>

	<a class="back-to-orders" href="/my-account/orders/">
		<?php get_template_part('template-parts/icon--arrow-left'); ?>
		Back to orders
	</a>
	
</div>
