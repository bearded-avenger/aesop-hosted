<?php
/**
 * Aesop Hosted
 *
 * @package   Aesop_Hosted_Admin
 * @author    Nick Haskins <email@nickhaskins.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2013 Nick Haskins
 */

/**
 *
 * @package Aesop_Hosted_Admin
 * @author  Your Name <email@example.com>
 */
class Aesop_Hosted_Admin {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	const version = '0.1';

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Slug of the plugin screen.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;


	/**
	 * Initialize the plugin by loading admin scripts & styles and adding a
	 * settings page and menu.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

		/*
		 * @TODO :
		 *
		 * - Uncomment following lines if the admin class should only be available for super admins
		 */
		/* if( ! is_super_admin() ) {
			return;
		} */
		require_once( AI_HOSTED_DIR.'admin/includes/screenhelp.php' );
		require_once( AI_HOSTED_DIR.'admin/includes/rename.php' );
		require_once( AI_HOSTED_DIR.'admin/includes/welcome.php' );
		require_once( AI_HOSTED_DIR.'admin/includes/dashboard.php' );
		require_once( AI_HOSTED_DIR.'admin/includes/menuclean.php' );
		require_once( AI_HOSTED_DIR.'admin/includes/postclean.php' );
		require_once( AI_HOSTED_DIR.'admin/includes/storytab.php' );
		require_once( AI_HOSTED_DIR.'admin/includes/adminbar.php' );
		require_once( AI_HOSTED_DIR.'admin/includes/pointers.php' );

		add_action('admin_enqueue_scripts', array($this,'admin_scripts'));
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		/*
		 * @TODO :
		 *
		 * - Uncomment following lines if the admin class should only be available for super admins
		 */
		/* if( ! is_super_admin() ) {
			return;
		} */

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 	* Load styles for story view
	 	*
	 	* @since     1.0.0
	*/
	public function admin_scripts(){


        //Register Styles
		wp_register_style( 'ai-hosted-styles', AI_HOSTED_URL. '/admin/assets/css/style.css', AI_HOSTED_VERSION, true);
		wp_register_script('ai-hosted-script', AI_HOSTED_URL.'/admin/assets/js/admin.js', AI_HOSTED_VERSION, true);

		// Load styles and scripts on areas that users will edit
		if ( is_admin() ) {

			// Enqueue styles
			wp_enqueue_style( 'ai-hosted-styles' );
			wp_enqueue_script('ai-hosted-script');

		}
	}
}
