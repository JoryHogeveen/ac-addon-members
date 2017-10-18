<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Members_Pro_Editing_AccessError extends ACP_Editing_Model
{
	/**
	 * @inheritdoc
	 * @see  ACP_Editing_Model::get_edit_value()
	 */
	public function get_edit_value( $id ) {
		return members_get_post_access_message( $id );
	}

	/**
	 * Get editing options when using an ajax callback
	 *
	 * @inheritdoc
	 * @see  ACP_Editing_Model::get_ajax_options()
	 */
	public function get_ajax_options( $request ) {
		return array_keys( wp_roles()->roles );
	}

	/**
	 * @inheritdoc
	 * @see  ACP_Editing_Model::get_view_settings()
	 */
	public function get_view_settings() {
		return array(
			'type'        => 'textarea',
			'placeholder' => __( 'Enter text to show when the user has no access', 'codepress-admin-columns' ),
		);
	}

	/**
	 * @inheritdoc
	 * @see  ACP_Editing_Model::save()
	 */
	public function save( $id, $value ) {
		members_set_post_access_message( $id, $value );

		return $value;
	}

}
