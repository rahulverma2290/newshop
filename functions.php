<?php

/*
* Creating a function to create our CPT
*/

function custom_post_type() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Sliders', 'Post Type General Name', 'newshop_child' ),
        'singular_name'       => _x( 'Slider', 'Post Type Singular Name', 'newshop_child' ),
        'menu_name'           => __( 'Sliders', 'newshop_child' ),
        'parent_item_colon'   => __( 'Parent Slider', 'newshop_child' ),
        'all_items'           => __( 'All Slider', 'newshop_child' ),
        'view_item'           => __( 'View Slider', 'newshop_child' ),
        'add_new_item'        => __( 'Add New Slider', 'newshop_child' ),
        'add_new'             => __( 'Add New', 'newshop_child' ),
        'edit_item'           => __( 'Edit Slider', 'newshop_child' ),
        'update_item'         => __( 'Update Slider', 'newshop_child' ),
        'search_items'        => __( 'Search Slider', 'newshop_child' ),
        'not_found'           => __( 'Not Found', 'newshop_child' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'newshop_child' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'sliders', 'newshop_child' ),
        'description'         => __( 'Slider news and reviews', 'newshop_child' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'slideTax' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'sliders', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type', 0 );

/* Custom Taxonomoies */

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type', 0 );

/* Custom Taxonomoies */

function themes_taxonomy() {  
    register_taxonomy(  
        'slides',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
         array('sliders'),      //post type name
        array(
            'hierarchical' => true,
            'label' => 'Slides Tax',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'slides', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before
            )
        )
    );
}

add_action( 'init', 'themes_taxonomy');

/*

To display all categories parent and sun both

add_action('init','woocommerce_subcats_from_parentcat_by_ID');

function woocommerce_subcats_from_parentcat_by_ID($parent_cat_ID) {

   $args = array(

       'hierarchical' => 1,

       'show_option_none' => '',

       'hide_empty' => 0,

       'parent' => $parent_cat_ID,

     'taxonomy' => 'product_cat'

   );

$subcats = get_categories($args);

echo '<ul class="wooc_sclist">';

foreach ($subcats as $sc) {

       $link = get_term_link( $sc->slug, $sc->taxonomy );

echo '<li><a href="'. $link .'">'.$sc->name.'</a></li>';

     }

echo '</ul>';

}*/


/*

For Display Parent Categories

add_action('init','woocommerce_subcats_from_parentcat_by_NAME');

function woocommerce_subcats_from_parentcat_by_NAME($parent_cat_NAME) {

$IDbyNAME = get_term_by('name', $parent_cat_NAME, 'product_cat');

$product_cat_ID = $IDbyNAME->term_id;

   $args = array(

       'hierarchical' => 1,

       'show_option_none' => '',

       'hide_empty' => 0,

       'parent' => $product_cat_ID,

       'taxonomy' => 'product_cat'

   );

$subcats = get_categories($args);

echo '<ul class="wooc_sclist">';

foreach ($subcats as $sc) {

       $link = get_term_link( $sc->slug, $sc->taxonomy );

echo '<li><a href="'. $link .'">'.$sc->name.'</a></li>';

     }

echo '</ul>';

}

*/

?>
