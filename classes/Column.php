<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

abstract class ACA_Members_Column extends AC_Column_Meta {

	public function __construct() {
		$this->set_group( 'members' );
	}

	/**
	 * @since 3.2.1
	 */
	public function get_field() {
		return $this->get_meta_key();
	}

}
