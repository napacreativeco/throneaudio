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

	

<?php
if ( have_posts() ) :

	while ( have_posts() ) :
		the_post();
		$post = $wp_query->get_queried_object();
  		$pagename = $post->post_name;
		?>

		<main class="page-container" id="<?php echo $pagename; ?>">

		<?php
		if (is_front_page())
		{
			?>
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/compiled/page--homepage.css">
			<?php
			get_template_part('template-parts/slideshow');
			get_template_part('template-parts/marquee');
			the_content();
			get_template_part('template-parts/home-products');
			
		}
		elseif ( is_page('categories') )
		{
			get_template_part('template-parts/categories');
			the_content();
		}

		elseif ( is_page('about') )
		{
			?>
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/compiled/page--about.css">
			<?php 
			the_content();
		}
		else {
			the_content();
		}
		?>

		</main><!-- #main -->
	<?php
	endwhile;

endif;
?>

<?php
get_footer();
