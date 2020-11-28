<?php
/*
* Template Name: About page
* Template Post Type: page
*/
get_header();
?>
<div class='about-content'>
  <?php while (have_posts()) : the_post(); ?>
      <h2 class='page-title'><?php the_title(); ?></h2>
      <div class="textOfPage">
        <?php the_content(); ?>
      </div>
      <?php the_post_thumbnail(); ?>
  <?php endwhile; ?>
<?php
query_posts(array(
   'post_type' => 'skills'
)); ?>
<h3>Skills</h3>
  <div class='row'>
      <?php while (have_posts()) : the_post(); ?>
            <div class='col-md-3 col-sm-6 col-xs-12 skills'>
              <h2><?php the_title(); ?></h2>
              <?php the_content(); ?>
            </div>
      <?php endwhile; ?>
  </div>
<?php
query_posts(array(
   'post_type' => 'tools'
));
?>
<h3>Tools</h3>
<div class='tools-wrapper'>
    <?php while (have_posts()) : the_post(); ?>
          <div class='tools' data-toggle="popover" title="<?php the_title(); ?>">
            <?php the_post_thumbnail(); ?>
          </div>
    <?php endwhile; ?>
</div>
</div>
<?php get_footer(); ?>
