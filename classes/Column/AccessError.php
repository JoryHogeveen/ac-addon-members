<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Members_Column_AccessError extends ACA_Members_Column {

	public function __construct() {
		parent::__construct();
		$this->set_type( 'members-access-error' );
		$this->set_label( __( 'Access Error text', 'codepress-admin-columns' ) );
	}

	/**
	 * Meta
	 *
	 * Cannot use members functions because of the filters.
	 */
	public function get_meta_key() {
		return '_members_access_error';
	}

	/**
	 * @see   AC_Column_Meta::get_raw_value()
	 */
	public function get_raw_value( $id ) {
		$value = members_get_post_access_message( $id );

		if ( ! $value ) {
			return false;
		}

		return $value;
	}

}
