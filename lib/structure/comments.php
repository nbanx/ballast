<?php
/**
 * Comments
 * 
 * @package tcaudill\Ballast\Structure
 * @since 1.0.0
 * @author Trevor Caudill
 * @link https://trevorcaudill.com
 * @license GNU General Public License 2.0+
 */

namespace tcaudill\Ballast;


add_filter( 'genesis_comment_list_args', __NAMESPACE__ . '\comments_gravatar' );
/**
 * Modify the size of the Gravatar in the author box.
 * 
 * @since 1.0.0
 * 
 * @param $size
 * 
 * @return int
 */
function comments_gravatar( $args ) {

	$args['avatar_size'] = 60;

	return $args;

}