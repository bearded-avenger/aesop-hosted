<?php
/**
 * Tools to modify hosted multisite verison of Aesop
 *
 *
 * @package   Aesop_Hosted
 * @author    Nick Haskins <email@nickhaskins.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2013 Nick Haskins
 *
 * @wordpress-plugin
 * Plugin Name:       Aesop Hosted
 * Plugin URI:        http://aesopinteractive.com
 * Description:       Open source platform for storytellers.
 * Version:           1.0.0
 * Author:            Nick Haskins
 * Author URI:        http://nickhaskins.com
 * Text Domain:       aesop-core
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/<owner>/<repo>
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// constnats
// Set some constants
define('AI_HOSTED_VERSION', '0.1');

define('AI_HOSTED_DIR', plugin_dir_path( __FILE__ ));
define('AI_HOSTED_URL', plugins_url( '', __FILE__ ));



/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( AI_HOSTED_DIR.'admin/class-aesop-hosted-admin.php' );

	add_action( 'plugins_loaded', array( 'Aesop_Hosted_Admin', 'get_instance' ) );

}
