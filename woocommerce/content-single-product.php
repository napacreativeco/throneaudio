<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/compiled/product.css">


<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'single-product', $product ); ?>>

	<div class="summary entry-summary">
        <span class="category"><?php echo wc_get_product_category_list($product->ID); ?></span>
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

    <div class="images">
        <?php
        $image_id  = $product->get_image_id();
        $image_url = wp_get_attachment_image_url( $image_id, 'full' );
        ?>
        <div class="featured-image">
            <img src="<?php echo $image_url; ?>" alt="">
        </div>
    </div>

    <div class="description">
        <?php the_content(); ?>
    </div>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
