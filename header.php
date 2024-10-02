<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Throne_Systems
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@200&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

	<title>
		<?php 
		if (!is_front_page()) {
			wp_title( '|', true, 'right' );
		}
		bloginfo('name');
		?>
	</title>

	<style>
		@font-face {
			font-family: 'apfel';
			src: url('<?php echo get_template_directory_uri(); ?>/assets/ApfelGrotezk-Regular.woff2') format('woff2'),
				url('<?php echo get_template_directory_uri(); ?>/assets/ApfelGrotezk-Regular.woff') format('woff');
			font-weight: normal;
			font-style: normal;
		}
	</style>
	

	<!-- <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet"> -->

	<script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.5.0/model-viewer.min.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<div class="site-container">

        <!--
        HEADER
        -->
		<header id="header-desktop" class="site-header">
			
			<div class="header-left">
                <a href="/" title="Throne Systems">
					<?php get_template_part('template-parts/throne-svg'); ?>
				</a>
                <nav class="center">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main-menu',
                            'menu_id'        => 'primary-menu',
                        )
                    );
                    ?>
                </nav>
			</div>

			<div class="header-right">

				<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
					<?php get_template_part('template-parts/icon--user'); ?>
				</a>
				<div class="cart-count open-drawer">
					<?php get_template_part('template-parts/icon--bag'); ?>
					<?php
						$count = WC()->cart->get_cart_contents_count();
					?>
					<?php if ( $count < 1 ) { ?>
						<?php echo $count; ?>
					<?php } elseif ($count <= 9) { ?>
						0<?php echo $count; ?>
					<?php } else { ?>
						<?php echo $count; ?>
					<?php } ?>
				</div>
			</div>

		</header>

		<header id="header-mobile">
			<div>
				<div class="hamburger" data-open="">
					<span class="top"></span>
					<span class="middle"></span>
					<span class="bottom"></span>
				</div>
			</div>
			<div>
				<a href="/" title="Throne Systems">
					<?php get_template_part('template-parts/throne-svg'); ?>
				</a>
			</div>
			<div>
			<div class="cart-count open-drawer">
					<?php get_template_part('template-parts/icon--bag'); ?>
					<?php
						$count = WC()->cart->get_cart_contents_count();
					?>
					<?php if ( $count < 1 ) { ?>
						<?php echo $count; ?>
					<?php } elseif ($count <= 9) { ?>
						0<?php echo $count; ?>
					<?php } else { ?>
						<?php echo $count; ?>
					<?php } ?>
				</div>
			</div>
		</header>

		<?php get_template_part('template-parts/mobile-menu'); ?>