<?php
/**
 * Header
 * 
 * @package tcaudill\Ballast
 * @since 1.0.0
 * @author Trevor Caudill
 * @link https://trevorcaudill.com
 * @license GNU General Public License 2.0+
 */

namespace tcaudill\Ballast;

add_filter( 'genesis_attr_site-description', 'genesis_attributes_screen_reader_class' );
