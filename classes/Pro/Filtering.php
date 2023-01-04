<?php
namespace ACA\Members\Pro;
use ACA\Members\Column;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Filtering extends \ACP\Filtering\Model\Meta {
	/**
	 * @inheritdoc
	 * @see  ACP_Filtering_Model_Meta::__construct()
	 */
	public function __construct( Column $column ) {
		parent::__construct( $column );
	}

}
