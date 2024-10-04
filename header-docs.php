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

<body <?php body_class('docs'); ?>>

	<?php wp_body_open(); ?>

	<div class="site-container">

        <header class="docs-header">
            <div class="row">
                <div>
                    <?php get_template_part('template-parts/throne-svg'); ?>
                    Throne Audio <span>Docs</span>
                </div>
                <div>
                    <a href="<?php echo home_url(); ?>">
                        <?php get_template_part('template-parts/icon--arrow-left'); ?> Back to Throneaudio.com
                    </a>
                </div>
            </div>
        </header>