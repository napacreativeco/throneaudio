<div class="thumbnails">
    <?php
    if ( $attachment_ids = $product->get_gallery_image_ids() ) {
        foreach ( $attachment_ids as $attachment_id ) {
            echo wc_get_gallery_image_html( $attachment_id );
        }
    }
    ?>
</div>