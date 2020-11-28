<?php
/*
 * Template Name: POST TEMPLATE
 * Template Post Type: post
 */?>
 <?php get_header(); ?>
 <div class="post-content">
   <h3><?php the_title(); ?></h3>
   <div class=''>
   <?php
       if ( have_posts() ) {
                 wp_reset_query();
                 setup_postdata($post);
                 echo esc_attr(htmlentities(the_content()));
             }
    ?>
    </div>
    <div class=' d-flex align-item-center justify-content-center'>
      <a class='btn' href="<?php echo get_home_url(); ?>">Back to all</a>
    </div>
 </div>
 <?php get_footer(); ?>
