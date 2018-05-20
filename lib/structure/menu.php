<?php
/**
 * Menu Structures
 * 
 * @package tcaudill\Ballast\Structure
 * @since 1.0.0
 * @author Trevor Caudill
 * @link https://trevorcaudill.com
 * @license GNU General Public License 2.0+
 */

namespace tcaudill\Ballast;

/**
 * Unregister menu callbacks.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_menu_callbacks() {
	remove_action( 'genesis_after_header', 'genesis_do_subnav' );
	remove_action('genesis_after_header', 'genesis_do_nav');
}

add_filter( 'wp_nav_menu_args', __NAMESPACE__ . '\secondary_menu_args' );
/**
 * Reduce the secondary navigation menu to one level depth.
 * 
 * @since 1.0.0
 * 
 * @return array
 */
function secondary_menu_args( array $args ) {

	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;

}
add_action('genesis_header_right', 'genesis_do_nav');
// add_action( 'genesis_header', 'genesis_do_nav' );
