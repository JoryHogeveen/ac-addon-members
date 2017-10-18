<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Members_Pro_Sorting extends ACP_Sorting_Model_Meta
{
	/**
	 * @inheritdoc
	 * @see  ACP_Sorting_Model_Meta::__construct()
	 */
	public function __construct( ACA_Members_Column $column ) {
		parent::__construct( $column );
	}

}
