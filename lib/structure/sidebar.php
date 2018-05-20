<?php
/**
 * Sidebar
 * 
 * @package tcaudill\Ballast\Structure
 * @since 1.0.0
 * @author Trevor Caudill
 * @link https://trevorcaudill.com
 * @license GNU General Public License 2.0+
 */

namespace tcaudill\Ballast;

/**
 * Unregister sidebar callbacks.
 *
 * @since 1.1.0
 *
 * @return void
 */
function unregister_sidebar_callbacks() {
    unregister_sidebar( 'header-right' );
    unregister_sidebar( 'sidebar-alt' );
}