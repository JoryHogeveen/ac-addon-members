<?php
namespace ACA\Members\Pro\Editing;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class AccessError extends \ACP\Editing\Model
{
	/**
	 * @inheritdoc
	 * @see  \ACP\Editing\Model::get_edit_value()
	 */
	public function get_edit_value( $id ) {
		return members_get_post_access_message( $id );
	}

	/**
	 * @inheritdoc
	 * @see  \ACP\Editing\Model::get_view_settings()
	 */
	public function get_view_settings() {
		return array(
			'type'        => 'textarea',
			'placeholder' => __( 'Enter text to show when the user has no access', 'ac-addon-members' ),
		);
	}

	/**
	 * @inheritdoc
	 * @see  \ACP\Editing\Model::save()
	 */
	public function save( $id, $value ) {
		members_set_post_access_message( $id, $value );

		return $value;
	}

}
