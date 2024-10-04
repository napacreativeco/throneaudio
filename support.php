<?php
/*
Template Name: Support
Template Post Type: page
*/

get_header();
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/compiled/page--support.css">

<div class="support-page">

    <div class="page-header">
        <h1>Support</h1>
        <p>Resources to help guide you through troubleshooting your plugins</p>
    </div>

    <div class="support">
        <?php
        $support_args = array( 'post_type' => 'support', 'orderby' => 'date', 'order' => 'ASC' );
        $support_loop = new WP_Query( $support_args );
        ?>

    
        <h3>Support</h3>
        <p></p>

        <ul class="support-list">
            <?php
            while ( $support_loop->have_posts() ) : $support_loop->the_post(); ?>
                <li class="support-item" data-index="<?php echo $support_loop->current_post; ?>" data-active="false" data-doc="<?php the_id(); ?>">
                    <details>
                        <summary>
                            <div class="title">
                                <h4><span class="indicator"></span> <?php the_title(); ?></h4>
                            </div>
                        </summary>

                        <div class="details-body">
                            <div class="empty"></div>
                            <div class="content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </details>
                </li>
            <?php endwhile; wp_reset_query(); // Remember to reset ?>
        </ul>
    </div>

    <div class="columns">
        <div class="faq">
            <?php
            $faq_args = array( 'post_type' => 'faq' );
            $faq_loop = new WP_Query( $faq_args );
            ?>

            <h3>F.A.Q.</h3>

            <ul class="faq-list">
                <?php
                while ( $faq_loop->have_posts() ) : $faq_loop->the_post(); ?>
                    <li class="support-item" data-index="<?php echo $faq_loop->current_post; ?>" data-active="false" data-doc="<?php the_id(); ?>">
                        <details>
                            <summary>
                                <div class="title">
                                    <h5><span class="indicator"></span> <?php the_title(); ?></h5>
                                </div>
                            </summary>

                            <div class="content">
                                <?php the_content(); ?>
                            </div>
                        </details>
                    </li>
                <?php endwhile; wp_reset_query(); // Remember to reset ?>
            </ul>
        </div>

    </div>

</div>

<?php
get_footer();
?>