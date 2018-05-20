<?php
/**
 * Ballast WooCommerce
 *
 * This file adds the Genesis Connect for WooCommerce notice to the Ballast child theme.
 *
 * @package Ballast
 * @author  trevorcaudill
 * @license GPL-2.0+
 * @link    https://trevorcaudill.com/
 */

add_filter( 'woocommerce_enqueue_styles', 'genesis_sample_woocommerce_styles' );
/**
 * Enqueues the theme's custom WooCommerce styles to the WooCommerce plugin.
 *
 * @param array $enqueue_styles The WooCommerce styles to enqueue.
 * @since 1.1.0
 *
 * @return array Modified WooCommerce styles to enqueue.
 */
function genesis_sample_woocommerce_styles( $enqueue_styles ) {

	$enqueue_styles['genesis-sample-woocommerce-styles'] = array(
		'src'     => get_stylesheet_directory_uri() . '/assets/css/woocommerce.css',
		'deps'    => '',
		'version' => CHILD_THEME_VERSION,
		'media'   => 'screen',
	);

	return $enqueue_styles;

}