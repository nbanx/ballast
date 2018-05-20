/**
 * Trigger AJAX request to save state when the WooCommerce notice is dismissed.
 *
 * @version 1.1.0
 *
 * @author trevorcaudill
 * @license GNU General Public License 2.0+
 * @package ballast
 */

jQuery( document ).on(
	'click', '.genesis-sample-woocommerce-notice .notice-dismiss', function() {

		jQuery.ajax(
			{
				url: ajaxurl,
				data: {
					action: 'genesis_sample_dismiss_woocommerce_notice'
				}
			}
		);

	}
);
