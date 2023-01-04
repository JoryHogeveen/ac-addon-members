<?php
namespace ACA\Members\Pro\Column;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class AccessError extends \ACA\Members\Column\AccessError
	implements ACP\Editing\Editable
	//, ACP_Column_SortingInterface, ACP_Column_FilteringInterface
{
	// Pro

	public function editing() {
		return new \ACA\Members\Pro\Editing\AccessError( $this );
	}

	public function sorting() {
		return new \ACA\Members\Pro\Sorting( $this );
	}

	public function filtering() {
		return new \ACA\Members\Pro\Filtering( $this );
	}

}
