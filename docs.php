<?php
/*
Template Name: Docs - Archive
Template Post Type: page
*/

get_header('docs');
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/compiled/page--docs.css">

<main class="docs-container">
    <?php
    $args = array( 'post_type' => 'docs' );
    $loop = new WP_Query( $args );
    ?>

    <div class="sidebar-opener">
        <?php get_template_part('template-parts/hamburger'); ?>
    </div>

    <!-- 
    -----------------
    SIDEBAR 
    -----------------
    -->
    <div class="docs-sidebar">
        <div class="wrap">

            <div class="top">
                <h2>Plugins</h2>
                <ul class="docs-list">
                <?php
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <li class="doc-item" data-index="<?php echo $loop->current_post; ?>" data-active="false" data-doc="<?php the_id(); ?>">
                        <?php the_title(); ?>
                    </li>
                <?php endwhile; wp_reset_query(); // Remember to reset ?>
                </ul>
            </div>

            <div class="bottom">
                <h3>Links</h3>
                <ul class="links">
                    <li>
                        <a href="/support" title="Support">
                            Support
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="Account">
                            Account
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <!-- 
    -----------------
    DOCS 
    -----------------
    -->
    <ul class="docs">
        <?php
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );

        while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <?php 
            global $product;
            $imageID = get_field('archive_image');
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );
            $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
            $product_attachment = get_field('product');
            if ($product_attachment) {
                $product_id = $product_attachment->ID; 
                $product_url = wc_get_product($product_id)->get_permalink();
            }
            ?>

            <li id="<?php the_id(); ?>" data-index="<?php echo $loop->current_post ?>" data-active="false" class="doc" onclick="window.location='<?php echo get_permalink( $loop->post->ID ) ?>';">
                <div class="title">
                    <h1>
                        <?php the_title(); ?>
                    </h1>
                    <p><?php the_excerpt(); ?></p>
                    <?php if (!empty($product_url)) { ?>
                        <span><a href="<?php echo $product_url; ?>">[ view product ]</a></span>
                    <?php } ?>
                </div>    
                
                <div class="image">
                    <img src="<?php if ($image) { echo $image[0]; } else { echo wc_placeholder_img_src(); } ?>" alt="<?php echo $alt_text; ?>" />
                </div>
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </li>


        <?php endwhile; wp_reset_query(); // Remember to reset ?>
    </ul>

</main>

<?php
//get_sidebar();
get_footer();