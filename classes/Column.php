<?php
namespace ACA\Members;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

abstract class Column extends \AC\Column\Meta
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
