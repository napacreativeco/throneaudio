<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Throne_Systems
 */

get_header();
?>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/compiled/page--fourohfour.css">

	<main class="page-container fourohfour">

	
			<h2>404</h2>
			<p>There is no page at this address</p>
			<a href="<?php echo home_url(); ?>">Return home</a>


	</main><!-- #main -->

<?php
get_footer();