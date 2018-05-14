<?php
/**
 * Post
 * 
 * @package tcaudill\Ballast\Structure
 * @since 1.0.0
 * @author Trevor Caudill
 * @link https://trevorcaudill.com
 * @license GNU General Public License 2.0+
 */

namespace tcaudill\Ballast;


add_filter( 'genesis_author_box_gravatar_size', __NAMESPACE__ . '\author_box_gravatar' );
/**
 * Modify the size of the Gravatar in the author box.
 * 
 * @since 1.0.0
 * 
 * @param $size
 * 
 * @return int
 */
function author_box_gravatar( $size ) {

	return 90;

}