<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/compiled/categories.css" />

<?php
$args = array(
     'taxonomy' => 'product_cat',
     'orderby' => 'name',
     'order' => 'ASC',
     'hide_empty' => false
);?>

<ul class="categories">
<?php
foreach( get_categories( $args ) as $category ) : ?>

    <?php
    $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true ); 
    $image_url = wp_get_attachment_url( $thumbnail_id ); 
    ?>

    <?php
    if ( $image_url ) 
    {
    ?>
        <li class="category" onclick="window.location='<?php echo get_category_link( $category ); ?>';">
            <div class="image">
                <img src="<?php echo $image_url; ?>" alt="Throne - <?php echo $category->cat_name; ?>" />
            </div>
            
            <div class="data">
                <div class="title">
                    <?php echo $category->cat_name; ?>
                </div>
            </div>
        </li>
    <?php
    }
    ?>

    
<?php
endforeach;
?>
</ul>