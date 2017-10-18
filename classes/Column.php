<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

abstract class ACA_Members_Column extends AC_Column_Meta
{
	/**
	 * @inheritdoc
	 * @see  AC_Column_Meta::__construct()
	 */
	public function __construct() {
		$this->set_group( 'members' );
	}

	/**
	 * @return string
	 */
	public function get_field() {
		return $this->get_meta_key();
	}

}
