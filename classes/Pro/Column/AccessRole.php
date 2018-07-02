<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Members_Pro_Column_AccessRole extends ACA_Members_Column_AccessRole
	implements \ACP\Editing\Editable, \ACP\Sorting\Sortable, \ACP\Filtering\Filterable {
	// Pro

	public function editing() {
		return new ACA_Members_Pro_Editing_AccessRole( $this );
	}

	public function sorting() {
		return new ACA_Members_Pro_Sorting( $this );
	}

	public function filtering() {
		return new ACA_Members_Pro_Filtering_AccessRole( $this );
	}

}
