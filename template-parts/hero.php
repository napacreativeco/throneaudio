<?php 
  $args = array (
  'post_type' => 'hero',
  'status' => 'publish',
  'order' => 'ASC',
  'posts_per_page' => 1
  );
 $the_query = new WP_Query($args);
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/compiled/hero.css" />

<div class="hero-static">
    <?php if($the_query->have_posts()) : ?>
        <?php while($the_query->have_posts()) : $the_query->the_post(); ?>

            <div class="wrap">
                <?php the_content(); ?>
            </div>
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />

        <?php endwhile; ?>
    <?php endif; wp_reset_query(); ?>
</div>