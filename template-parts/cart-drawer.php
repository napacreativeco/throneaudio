<div class="cart-drawer">
    <div class="top-bar">
        
        <h2>
            <a href="<?php echo wc_get_cart_url(); ?>" title="Cart">
                Cart (<?php echo WC()->cart->get_cart_contents_count(); ?>)
            </a>
        </h2> 
        <span class="close-drawer">Close</span>
       
    </div>
    <?php woocommerce_mini_cart(); ?>
</div>
