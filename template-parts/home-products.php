<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/compiled/home-products.css" />

<h2 class="section-title">Our Plugins</h2>
<ul class="products">
    <?php
    $args = array( 'post_type' => 'product' );
    $loop = new WP_Query( $args );
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );

    while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <?php global $product; ?>
        <?php $imageID = get_field('archive_image'); ?>
        <?php /* $image = wp_get_attachment_image_src( $imageID, 'full' ); */ ?>
        <?php /* $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' ); */ ?>
        <?php
        $attachment_ids = $product->get_gallery_image_ids();

        foreach( $attachment_ids as $attachment_id ) {
            $image_url = wp_get_attachment_url( $attachment_id );
        }
        ?>
        <?php $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true); ?>

        <li class="product">
            
            <div class="row">
                <div class="image" onclick="window.location='<?php the_permalink(); ?>';" style="background: url('<?php if (get_field('archive_image')) { echo $image_url; } else { echo wc_placeholder_img_src(); }  ?>'); background-size: cover; background-position: center center;">
                </div>

                <div class="data">
                    <div class="left">
                        <div class="title">
                            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                        </div>

                        <div class="description">
                            <p><?php the_excerpt(); ?></p>
                        </div>
                    
      
                    </div>

                    <div class="right">
                        <p class="price">$<?php echo $product->get_price() ?></p>
                        <button class="add-to-cart" onclick="window.location='/cart/?add-to-cart=<?php echo $product->get_id(); ?>&quantity=1'">Buy Now</button>
                    </div>
                
                    
                </div>
                
            </div>
        
            <div class="bottom-border">&nbsp;</div>
            
        </li>


    <?php endwhile; wp_reset_query(); // Remember to reset ?>
</ul>