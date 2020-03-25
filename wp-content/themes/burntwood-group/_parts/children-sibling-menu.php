<?php
    //if this page is a subpage page
    global $post;
    $currentPage = $post->ID;
    if( is_page() && $post->post_parent ) : $parent = $post->post_parent;
?>

<?php
    $args = array(
        'post_parent' => $parent,
        'post_type' => 'page',
        'posts_per_page' => -1,
        'child_of' => $parent
    );

    $query = new WP_Query( $args );

    // The Loop
    if ( $query->have_posts() ) : ?>

        <div class="related-services">
           
            <h4 class="title">Related services</h4>

             <ul>

                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    
                    <li class="<?php echo $post->post_name; ?> <?php if($currentPage == $post->ID) : ?>current-child-item<?php endif; ?>">

                    <?php

                    /* This uses the featured image as a background. Takes the featured image, and applies the different sizes to varying breakpoints. */

                    $thumb_id = get_post_thumbnail_id($query->ID);
                    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'square-350', true);
                    $thumb_url = $thumb_url_array[0];

                    if ( $thumb_id ) : ?>

                        <style scoped>
                            .<?php echo $post->post_name; ?> {
                              background-image: url(<?php echo $thumb_url; ?>);
                            }
                        </style>

                    <?php else : ?>

                        <style scoped>
                            .<?php echo $post->post_name; ?> {
                              background-color: #eee;
                            }
                        </style>

                    <?php endif; ?>
                        <a href="<?php the_permalink(); ?>">
                            <span><?php the_title() ?></span>
                        </a>
                    </li>

                <?php endwhile; ?>

            </ul><!-- /child-nav-->

        </div>

    <?php endif; ?>

<?php 
    //else the page is a parent
    else :
?>

<?php
    $args = array(
        'post_parent' => $post->ID,
        'post_type' => 'page',
        'posts_per_page' => -1
    );

    $query = new WP_Query( $args );

    // The Loop
    if ( $query->have_posts() ) : ?>

        <div class="related-services">
           
            <h4 class="title">Related services</h4>

            <ul>

                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    
                    <li class="<?php echo $post->post_name; ?> <?php if($currentPage == $post->ID) : ?>current-child-item<?php endif; ?>">

                    <?php

                    /* This uses the featured image as a background. Takes the featured image, and applies the different sizes to varying breakpoints. */

                    $thumb_id = get_post_thumbnail_id($query->ID);
                    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'square-350', true);
                    $thumb_url = $thumb_url_array[0];

                    if ( $thumb_id ) : ?>

                        <style scoped>
                            .<?php echo $post->post_name; ?> {
                              background-image: url(<?php echo $thumb_url; ?>);
                            }
                        </style>

                    <?php else : ?>

                        <style scoped>
                            .<?php echo $post->post_name; ?> {
                              background-color: #eee;
                            }
                        </style>

                    <?php endif; ?>
                        <a href="<?php the_permalink(); ?>">
                            <span><?php the_title() ?></span>
                        </a>
                    </li>

                <?php endwhile; ?>

            </ul><!-- /child-nav-->

        </div>

    <?php endif; ?>           

<?php endif; wp_reset_postdata(); ?>

