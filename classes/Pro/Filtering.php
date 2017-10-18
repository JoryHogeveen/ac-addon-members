<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Members_Pro_Filtering extends ACP_Filtering_Model_Meta {

	public function __construct( ACA_Members_Column $column ) {
		parent::__construct( $column );
	}

}
