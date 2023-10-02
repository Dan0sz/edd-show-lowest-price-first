<?php
/**
 * Plugin Name: Easy Digital Downloads - Show Lowest Price First
 * Description: Flips the offers in the schema.org structured data, to make sure the lowest price is shown first on Google.
 * Version: 1.0.0
 * Author: Daan from Daan.dev
 * Author URI: https://daan.dev/about/
 */

defined( 'ABSPATH' ) || exit;

/**
 * Reverse the sort order of the Offers element.
 *
 * @param $data
 *
 * @return mixed
 */
function edd_flip_schema_prices( $data ) {
	if ( isset( $data['offers'] ) && count( $data['offers'] ) > 1 ) {
		$data['offers'] = array_reverse( $data['offers'] );
	}
	
	return $data;
}

add_filter( 'edd_generate_download_structured_data', 'edd_flip_schema_prices' );
