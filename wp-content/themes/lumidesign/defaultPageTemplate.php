<?php
/*
* Template Name: Default page template witout any widget in the footer
* Template Post Type: page
*/
get_header();
?>
<div class='custom-container'>
	<?php while (have_posts()) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
	<?php endwhile; ?>
</div><!-- #site-content -->
<?php get_footer(); ?>
