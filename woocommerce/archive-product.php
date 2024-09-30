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

<main>

    <ul class="products">
        <?php
        $args = array( 'post_type' => 'product' );
        $loop = new WP_Query( $args );
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );

        while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <?php global $product; ?>
            <?php $imageID = get_field('archive_image'); ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' ); ?>
            <?php $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true); ?>

            <li class="product" onclick="window.location='<?php echo get_permalink( $loop->post->ID ) ?>';">
                <div class="image">
                    <img src="<?php if ($image) { echo $image[0]; } else { echo wc_placeholder_img_src(); } ?>" alt="<?php echo $alt_text; ?>" />

                    <div class="data">
                        <div class="left">
                            <span class="category"><?php echo wc_get_product_category_list($loop->post->ID); ?></span>
                            <div class="info">
                                <h2 class="title"><?php the_title(); ?></h2>
                                <p class="description"><?php the_excerpt(); ?></p>
                            </div>
                        </div>

                        <div class="right">
                            <p class="price">$<?php echo $product->get_price() ?></p>
                            <a class="add-to-cart" href="window.location='/cart/?add-to-cart=<?php echo $product->get_id(); ?>&quantity=1'">Buy Now</a>
                        </div>
                    </div>

                </div>
            </li>


        <?php endwhile; wp_reset_query(); // Remember to reset ?>
    </ul>

</main>

<?php
//get_sidebar();
get_footer('shop');