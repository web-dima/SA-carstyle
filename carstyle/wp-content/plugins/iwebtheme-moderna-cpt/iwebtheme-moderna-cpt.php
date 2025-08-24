<?php
/*
Plugin Name: iWebtheme Moderna CPT
Plugin URI: http://iweb-studio.com
Description: Custom post type plugin for Moderna theme
Author: iWebStudio
Author URI: http://iweb-studio.com
Version: 1.0
License: GNU General Public License version 2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/*============================================
Custom post type
=============================================*/
// register flexslider cpt
add_action( 'init', 'iwebtheme_post_type_flexslider' );

function iwebtheme_post_type_flexslider() {

    $labels = array( 
        'name' => _x( 'Flexsliders', 'flexslider', 'iwebtheme' ),
        'singular_name' => _x( 'Flexslider', 'flexslider', 'iwebtheme' ),
        'add_new' => _x( 'Add New', 'flexslider', 'iwebtheme' ),
        'add_new_item' => _x( 'Add New Flexslider slider', 'flexslider', 'iwebtheme' ),
        'edit_item' => _x( 'Edit Flexslider slider', 'flexslider', 'iwebtheme' ),
        'new_item' => _x( 'New Flexslider slider', 'flexslider', 'iwebtheme' ),
        'view_item' => _x( 'View Flexslider slider', 'flexslider', 'iwebtheme' ),
        'search_items' => _x( 'Search Flexslider slider', 'flexslider', 'iwebtheme' ),
        'not_found' => _x( 'No flexslider slider found', 'flexslider', 'iwebtheme' ),
        'not_found_in_trash' => _x( 'No flexslider slider found in Trash', 'flexslider', 'iwebtheme' ),
        'parent_item_colon' => _x( 'Parent Flexslider slider:', 'flexslider', 'iwebtheme' ),
        'menu_name' => _x( 'Flexslider sliders', 'flexslider', 'iwebtheme' ),
		'all_items' => _x( 'All Flexslider sliders', 'flexslider', 'iwebtheme' )
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title', 'revisions' ),
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
		'menu_icon' => plugins_url() . '/iwebtheme-moderna-cpt/img/icon-slider.png',
        'capability_type' => 'post'
    );

    register_post_type( 'flexslider', $args );
}

 
/* ================================= end flexslider ================================*/



// register portfolio cpt

add_action( 'init', 'iwebtheme_post_type_portfolio' );

function iwebtheme_post_type_portfolio() {

    $labels = array( 
        'name' => _x( 'Portfolios', 'portfolio', 'iwebtheme' ),
        'singular_name' => _x( 'Portfolio', 'portfolio', 'iwebtheme' ),
        'add_new' => _x( 'Add New', 'portfolio', 'iwebtheme' ),
        'add_new_item' => _x( 'Add New Portfolio', 'portfolio', 'iwebtheme' ),
        'edit_item' => _x( 'Edit Portfolio', 'portfolio', 'iwebtheme' ),
        'new_item' => _x( 'New Portfolio', 'portfolio', 'iwebtheme' ),
        'view_item' => _x( 'View Portfolio', 'portfolio', 'iwebtheme' ),
        'search_items' => _x( 'Search Portfolio', 'portfolio', 'iwebtheme' ),
        'not_found' => _x( 'No portfolio found', 'portfolio', 'iwebtheme' ),
        'not_found_in_trash' => _x( 'No portfolio found in Trash', 'portfolio', 'iwebtheme' ),
        'parent_item_colon' => _x( 'Parent Portfolio:', 'portfolio', 'iwebtheme' ),
        'menu_name' => _x( 'Portfolios', 'portfolio', 'iwebtheme' ),
		'all_items' => _x( 'All Portfolios', 'portfolio', 'iwebtheme' )
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'revisions' ),
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
		'menu_icon' => plugins_url() . '/iwebtheme-moderna-cpt/img/icon-portfolio.png',
        'capability_type' => 'post'
    );

    register_post_type( 'portfolio', $args );
}

// add taxonomies to categorize different custom post types

// portfolio tax
add_action( 'init', 'build_taxonomies', 0);
function build_taxonomies() {
register_taxonomy("portfolio_categories", array("portfolio"), array("hierarchical" => true, "label" => "Categories", "singular_label" => "Category", "rewrite" => true));
}

add_filter("manage_edit-portfolio_columns", "add_new_columns");  
add_action("manage_posts_custom_column",  "add_column_data", 2,10 );

function add_new_columns($defaults) {
    $defaults['portfolio_categories'] = __('Categories', 'iwebtheme');
    return $defaults;
}
function add_column_data( $column_name, $post_id ) {
	if( $column_name == 'portfolio_categories' ) {
		$_taxonomy = 'portfolio_categories';
		$terms = get_the_terms( $post_id, $_taxonomy );
		if ( !empty( $terms ) ) {
			$out = array();
			foreach ( $terms as $c )
				$out[] = "<a href='edit-tags.php?action=edit&taxonomy=$_taxonomy&post_type=portfolio&tag_ID={$c->term_id}'> " . esc_html(sanitize_term_field('name', $c->name, $c->term_id, 'category', 'display')) . "</a>";
			echo join( ', ', $out );
		}
		else {
			_e('No Category', 'iwebtheme');
		}
	}
}
?>