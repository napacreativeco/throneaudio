<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit; ?>

<div class="account-page">

	<!-- HEADER -->
	<div class="account-header">
		<a href="/" title="Home">
			<?php get_template_part('template-parts/icon--arrow-left'); ?>

			<span>Return home</span>
		</a>
	</div>

	<!-- PAGE -->
	<div class="account-container">

		<div class="left desktop">

			<div>
				<h4>Account</h4>
			</div>
			<?php
			/**
			 * My Account navigation.
			 *
			 * @since 2.6.0
			 */
			do_action( 'woocommerce_account_navigation' ); ?>
		</div>

		<div class="left mobile">
			<details>
				<summary>
					<h4>
						Account
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" focusable="false" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="m11.9 5.6-4.653 4.653a.35.35 0 0 1-.495 0L2.1 5.6"></path>
						</svg>
					</h4>
				</summary>
				<div class="details-body">
					<?php
					/**
					 * My Account navigation.
					 *
					 * @since 2.6.0
					 */
					do_action( 'woocommerce_account_navigation' ); ?>
				</div>
			</details>
		</div>

		<div class="woocommerce-MyAccount-content">
			<?php
				/**
				 * My Account content.
				 *
				 * @since 2.6.0
				 */
				do_action( 'woocommerce_account_content' );
			?>
		</div>
	</div>

</div>
