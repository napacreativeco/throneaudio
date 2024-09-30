<?php 
  $args = array (
  'post_type' => 'slide',
  'status' => 'publish',
  'order' => 'ASC',
  'posts_per_page' => -1
  );
 $the_query = new WP_Query($args);
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/compiled/slideshow.css" />

<div class="swiper hero-swiper">
    <div class="swiper-wrapper">
        <?php if($the_query->have_posts()) : ?>
            <?php while($the_query->have_posts()) : $the_query->the_post(); ?>

                <div class="swiper-slide" 
                     data-layout="<?php the_field('image_style'); ?>"
                     style="background-color: <?php the_field('background_color'); ?>">

                    <?php
                    $image_style = get_field('image_style');
                    if ($image_style == 'background') {
                    ?>
                        <div class="background-image">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
                        </div>

                        <div class="text-content">
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_content(); ?></p>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if ($image_style == 'featured') { ?>
                        <div class="wrap">
                            <div class="text-content">
                                <h2><?php the_title(); ?></h2>
                                <p><?php the_content(); ?></p>
                            </div>
                            <div class="featured-image">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
                            </div>
                        </div>
                    <?php 
                    }
                    ?>

                </div>

            <?php endwhile; ?>
        <?php endif; wp_reset_query(); ?>
    </div>
    <div class="swiper-pagination"></div>

    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

</div>