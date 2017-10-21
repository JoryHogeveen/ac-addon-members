<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Members_Column_AccessError extends ACA_Members_Column
{
	/**
	 * @inheritdoc
	 * @see  ACA_Members_Column::__construct()
	 */
	public function __construct() {
		parent::__construct();
		$this->set_type( 'members-access-error' );
		$this->set_label( __( 'Access Error text', 'ac-addon-members' ) );
	}

	/**
	 * @return  string
	 */
	public function get_meta_key() {
		return '_members_access_error';
	}

	/**
	 * @inheritdoc
	 * @see  AC_Column_Meta::get_raw_value()
	 */
	public function get_raw_value( $id ) {
		$value = members_get_post_access_message( $id );

		if ( ! $value ) {
			return false;
		}

		return $value;
	}

}
