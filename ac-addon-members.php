<?php
/**
 * Plugin Name:  Admin Columns - Members add-on
 * Plugin URI:   https://github.com/JoryHogeveen/ac-addon-members
 * Version:      1.0
 * Description:  Show Members fields in your admin post overviews and edit them inline! Members integration Add-on for Admin Columns.
 * Author:       Jory Hogeveen
 * Author URI:   http://www.keraweb.nl
 * Text Domain:  ac-addon-members
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Members {

	const CLASS_PREFIX = 'ACA_Members_';

	/**
	 * @var ACA_Members
	 */
	protected static $_instance = null;

	/**
	 * @return ACA_Members
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * ACA_Members constructor.
	 */
	private function __construct() {
		add_action( 'after_setup_theme', array( $this, 'init' ) );
	}

	/**
	 * Check dependencies and register actions.
	 */
	public function init() {
		if ( ! is_admin() ) {
			return;
		}

		if ( ! current_user_can( 'restrict_content' ) ) {
			return;
		}

		if ( $this->has_missing_dependencies() ) {
			return;
		}

		AC()->autoloader()->register_prefix( self::CLASS_PREFIX, $this->get_plugin_dir() . 'classes/' );

		add_action( 'ac/column_groups', array( $this, 'register_column_groups' ) );
		// Prio 9 to make sure PRO is loaded after FREE.
		add_action( 'ac/column_types', array( $this, 'add_columns' ), 9 );
		add_action( 'acp/column_types', array( $this, 'add_pro_columns' ) );
	}

	/**
	 * @param AC_Groups $groups
	 */
	public function register_column_groups( $groups ) {
		$groups->register_group( 'members', __( 'Members', 'members' ), 11 );
	}

	/**
	 * @return bool True when there are missing dependencies
	 */
	private function has_missing_dependencies() {
		require_once plugin_dir_path( __FILE__ ) . 'classes/Dependencies.php';

		$dependencies = new ACA_Members_Dependencies( __FILE__ );

		// Pro not required.
		//$dependencies->is_acp_active( '4.0.3' );

		if ( ! $this->is_members_active() ) {
			$dependencies->add_missing( $dependencies->get_search_link( 'Members', 'Members' ) );
		}

		if ( ! members_content_permissions_enabled() ) {
			$link = $dependencies->get_html_link( admin_url( 'options-general.php?page=members-settings' ), 'Members Content Permissions' );
			$dependencies->add_missing( $link );
		}

		return $dependencies->has_missing();
	}

	/**
	 * @return string
	 */
	public function get_plugin_basename() {
		static $basename = null;
		if ( $basename ) {
			return $basename;
		}
		$basename = plugin_basename( __FILE__ );
		return $basename;
	}

	/**
	 * @return string
	 */
	public function get_plugin_dir() {
		static $dir = null;
		if ( $dir ) {
			return $dir;
		}
		$dir = plugin_dir_path( __FILE__ );
		return $dir;
	}

	/**
	 * @return int|float|string
	 */
	public function get_version() {
		static $version = null;
		if ( $version ) {
			return $version;
		}
		$plugins = get_plugins();
		$version = $plugins[ $this->get_plugin_basename() ]['Version'];
		return $version;
	}

	/**
	 * Whether Admin Columns Pro is active
	 *
	 * @return bool
	 */
	private function is_pro_active() {
		return function_exists( 'ac_is_pro_active' ) && ac_is_pro_active();
	}

	/**
	 * Whether Members is active
	 *
	 * @return bool Returns true if Members is active, false otherwise
	 */
	public function is_members_active() {
		return class_exists( 'Members_Plugin' );
	}

	/**
	 * Add custom columns
	 *
	 * @param AC_ListScreen $list_screen
	 *
	 */
	public function add_columns( $list_screen ) {
		switch ( true ) {
			case $list_screen instanceof AC_ListScreen_Post:
				$list_screen->register_column_type( new ACA_Members_Column_AccessRole() );
				$list_screen->register_column_type( new ACA_Members_Column_AccessError() );
				break;
		}
	}

	/**
	 * Add custom columns
	 *
	 * @param AC_ListScreen $list_screen
	 */
	public function add_pro_columns( $list_screen ) {
		switch ( true ) {
			case $list_screen instanceof AC_ListScreen_Post:
				$list_screen->register_column_type( new ACA_Members_Pro_Column_AccessRole() );
				$list_screen->register_column_type( new ACA_Members_Pro_Column_AccessError() );
				break;
		}
	}

}

/**
 * @return ACA_Members
 */
function ac_addon_members() {
	return ACA_Members::instance();
}

ac_addon_members();
