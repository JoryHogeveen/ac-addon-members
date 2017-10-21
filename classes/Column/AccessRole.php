<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Members_Column_AccessRole extends ACA_Members_Column
{
	/**
	 * @inheritdoc
	 * @see  ACA_Members_Column::__construct()
	 */
	public function __construct() {
		parent::__construct();
		$this->set_type( 'members-access-role' );
		$this->set_label( __( 'Access Roles', 'ac-addon-members' ) );
	}

	/**
	 * @return  string
	 */
	public function get_meta_key() {
		return '_members_access_role';
	}

	/**
	 * @inheritdoc
	 * @see  AC_Column::get_value()
	 */
	public function get_value( $id ) {
		$value = (array) $this->get_raw_value( $id );

		if ( ! $value ) {
			return false;
		}

		$value = array_map( 'strval', $value );

		$role_names = ac_helper()->user->get_roles();

		foreach ( $value as $key => $val ) {
			if ( ! empty( $role_names[ $val ] ) ) {
				$value[ $key ] = $role_names[ $val ];

				$url = esc_url( members_get_edit_role_url( $val ) );
				if ( $url ) {
					$value[ $key ] = '<a href="' . $url . '">' . $value[ $key ] . '</a>';
				}
			}
		}

		$value = implode( ', ', $value );

		return $value;
	}

	/**
	 * @inheritdoc
	 * @see  AC_Column_Meta::get_raw_value()
	 */
	public function get_raw_value( $id ) {
		$value = members_get_post_roles( $id );//$this->get_meta_value( $id, $this->get_meta_key(), false );

		if ( ! $value ) {
			return false;
		}

		return $value;
	}

}
