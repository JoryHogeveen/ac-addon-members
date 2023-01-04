<?php
namespace ACA\Members\Column;
use ACA\Members\Column;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class AccessError extends Column
{
	/**
	 * @inheritdoc
	 * @see  Column::__construct()
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
	 * @see  \AC\Column\Meta::get_raw_value()
	 */
	public function get_raw_value( $id ) {
		$value = members_get_post_access_message( $id );

		if ( ! $value ) {
			return false;
		}

		return $value;
	}

}
