<?php
/**
* Front Page Template
*
* @package trevorcaudill\Front_Page
* @since 1.0.0
* @author Trevor Caudill
* @link https://trevorcaudill.com
* @license GNU General Public License 2.0+
*/

namespace trevorcaudill\Front_Page;

// remove_all_actions( 'genesis_entry_footer' );
// remove_action( 'genesis_loop', 'genesis_do_loop' );

// add_action( 'genesis_after_header', __NAMESPACE__ . '\render_front_page_hero');
/**
* Load Chosen Front Page Template
*
* @since 1.0.0
*
* @return void
*/
function render_front_page_hero() {

    require_once __DIR__ . '/lib/views/front-page-one.php';
}

add_filter( 'body_class', __NAMESPACE__ . '\add_body_class_for_front_page', 1 );
/**
* Add Custom Body Class to Front Page
*
* @since 1.0.0
*
* @param array $body_classes Array of body classes
*
* @return array
*/
function add_body_class_for_front_page( array $body_classes ) {
	$body_classes[] = 'ballast-front-page';

	return $body_classes;
}


genesis();