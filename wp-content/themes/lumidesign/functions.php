<?php
function get_ajax_posts() {

  $order = 'date';
  if ($_POST['categorySlug'] === 'all') {
    $order = 'rand';
  }

    // Query Arguments
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => $order,
        'category_name' =>  $_POST['categorySlug'],
    );

    // The Query
    $ajaxposts = new WP_Query( $args );

    $response = '';

    // The Query
    if ( $ajaxposts->have_posts() ) {
        while ( $ajaxposts->have_posts() ) {
            $ajaxposts->the_post();
            $response .= get_template_part('postovi');
        }
    } else {
        $response .= get_template_part('none');
    }

    echo $response;

    exit; // leave ajax call
}

// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_get_ajax_posts', 'get_ajax_posts');
add_action('wp_ajax_nopriv_get_ajax_posts', 'get_ajax_posts');

/* Custom Post Type Start */
function create_posttype() {
  /////////////////////////////////////
register_post_type( 'skills',
// CPT Options
array(
  'labels' => array(
   'name' => __( "Jovana's Skills" ),
   'singular_name' => __( 'Skills' )
  ),
  'public' => true,
  'has_archive' => false,
  'rewrite' => array('slug' => 'skills'),
 )
);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
/* Custom Post Type End */
/*Custom Post type start*/
function cw_post_type_tools() {
$supports = array(
'title', // post title
'editor', // post content
'thumbnail', // featured images
'custom-fields', // custom fields
'revisions', // post revisions
'post-formats', // post formats
);
$labels = array(
'name' => _x('tools', 'plural'),
'singular_name' => _x('tools', 'singular'),
'menu_name' => _x("Jovana's tools", 'admin menu'),
'name_admin_bar' => _x('tools', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New tools'),
'new_item' => __('New tools'),
'edit_item' => __('Edit tools'),
'view_item' => __('View tools'),
'all_items' => __('All tools'),
'search_items' => __('Search tools'),
'not_found' => __('No tools found.'),
);
$args = array(
'supports' => $supports,
'labels' => $labels,
'public' => true,
'query_var' => true,
'rewrite' => array('slug' => 'tools'),
'has_archive' => true,
'hierarchical' => false,
);
register_post_type('tools', $args);
}
add_action('init', 'cw_post_type_tools');

 ?>
