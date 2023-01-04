<?php
namespace ACA\Members\Pro;
use ACA\Members\Column;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Sorting extends \ACP\Sorting\Model\Meta
{
	/**
	 * @inheritdoc
	 * @see  ACP_Sorting_Model_Meta::__construct()
	 */
	public function __construct( Column $column ) {
		parent::__construct( $column );
	}

}
