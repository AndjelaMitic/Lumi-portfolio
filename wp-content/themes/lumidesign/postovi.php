<div class="box col-md-4 col-sm-6 col-xs-12">
<a href='<?php echo the_permalink(); ?>'>
  <?php the_post_thumbnail(); ?>
  <div class='project-info'>
    <div class='info-wrap'>
    <h3><?php the_title(); ?></h3>
    <?php $tags = get_the_tags();
    if ( $tags ) {
      foreach( $tags as $tag ) {
          echo '<p>' . $tag->name . '</p>';
        }
      }
     ?>
   </div>
  </div>
  </a>
</div>
