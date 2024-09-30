<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Throne_Systems
 */

get_header('shop');
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/compiled/shop--products.css">
    <ul>
        <?php
        while ( have_posts() ) :
            the_post();?>

        <?php
        endwhile; // End of the loop.
        ?>
    </ul>

<?php
//get_sidebar();
get_footer('shop');