<?php /* Template Name: Home page */ ?>
<?php get_header(); ?>

<div class='home-content'>
  <?php    if ( have_posts() ) {
               wp_reset_query();
               setup_postdata($post);
               echo esc_attr(htmlentities(the_content()));
           } ?>
</div>
<ul class="menu tab-list">
  <li><p id='all' class='active'>ALL</p></li>
  <li><p id='web'>WEB</p></li>
  <li><p id='logo'>LOGO</p></li>
  <li><p id='app'>APP</p></li>
  <li><p id='print'>PRINT</p></li>
</ul>
<div class='posts-area row'>
<?php
  $args = array(
  'post_type'=> 'post',
  'orderby'    => 'ID',
  'post_status' => 'publish',
  'orderby'    => 'rand',
  'category' => 'all',
  'posts_per_page' => -1 // this will retrive all the post that is published
  );
  $result = new WP_Query( $args );
  if ( $result-> have_posts() ) : ?>
  <?php while ( $result->have_posts() ) : $result->the_post(); ?>
      <div class='box col-md-4 col-sm-6 col-xs-12'>
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
  <?php endwhile; ?>
  <?php endif; wp_reset_postdata();?>
</div>

<script>
var list = document.querySelectorAll('ul.menu li p');
for (var i = 0; i < list.length; i++) {
  list[i].addEventListener('click',function(){
    removeActiveClass(list);
    this.classList.add('active');
    var id = this.id;
    loadPost(id);
  });
}
function removeActiveClass(list){
  for (var i = 0; i < list.length; i++) {
    list[i].classList.remove('active');
  }
}
function loadPost(category) {
  $.ajax({
          type: 'POST',
          url: '<?php echo admin_url('admin-ajax.php');?>',
          dataType: "html", // add data type
          data: { action : 'get_ajax_posts', categorySlug : category },
          success: function( response ) {
              $( '.posts-area' ).html( response );
          }
      });
};
</script>
<?php get_footer(); ?>
