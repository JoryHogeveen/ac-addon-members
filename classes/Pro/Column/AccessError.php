<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Members_Pro_Column_AccessError extends ACA_Members_Column_AccessError
	implements ACP_Column_EditingInterface
	//, ACP_Column_SortingInterface, ACP_Column_FilteringInterface
{
	// Pro

	public function editing() {
		return new ACA_Members_Pro_Editing_AccessError( $this );
	}

	public function sorting() {
		return new ACA_Members_Pro_Sorting( $this );
	}

	public function filtering() {
		return new ACA_Members_Pro_Filtering( $this );
	}

}
