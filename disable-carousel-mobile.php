<?php
/**
 * Plugin Name: Disable Jetpack Carousel on Mobile
 * Plugin URI: https://github.com/stevengliebe/disable-carousel-mobile
 * Description: Disables Jetpack Carousel on mobile devices.
 * Version: 1.2.2
 * Author: Steven Gliebe
 * Author URI: http://stevengliebe.com
 * License: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Disable Jetpack Carousel if using phone or tablet
 *
 * @since 1.0
 * @param bool $value Current state of Carousel enablement
 * @return bool True if mobile detected, to disable Carousel
 */
function djcm_disable_carousel( $value ) {

	// Include the Mobile_Detect class
	// https://github.com/serbanghita/Mobile-Detect
	if ( ! class_exists( 'Mobile_Detect' ) ) { // avoid conflict with other plugins or theme
		include 'Mobile_Detect.php';
	}

	// Instantiate the class
	$detect = new Mobile_Detect();

	// Is user's device mobile?
	if ( $detect->isMobile() ) {
		$value = true; // true to disable Carousel
	}

	// Return original or changed value
	return $value;

}

add_filter( 'jp_carousel_maybe_disable', 'djcm_disable_carousel' );
