<?php
namespace ACA\Members\Pro\Column;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class AccessRole extends \ACA\Members\Column\AccessRole
	implements \ACP\Editing\Editable, \ACP\Sorting\Sortable, \ACP\Filtering\Filterable {
	// Pro

	public function editing() {
		return new \ACA\Members\Pro\Editing\AccessRole( $this );
	}

	public function sorting() {
		return new \ACA\Members\Pro\Sorting( $this );
	}

	public function filtering() {
		return new \ACA\Members\Pro\Filtering\AccessRole( $this );
	}

}
