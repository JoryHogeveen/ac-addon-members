<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Members_Pro_Editing_AccessRole extends ACP_Editing_Model
{
	/**
	 * @inheritdoc
	 * @see  ACP_Editing_Model::get_edit_value()
	 */
	public function get_edit_value( $id ) {
		return implode( ',', (array) members_get_post_roles( $id ) );
	}

	/**
	 * Get editing options when using an ajax callback
	 *
	 * @inheritdoc
	 * @see  ACP_Editing_Model::get_ajax_options()
	 */
	public function get_ajax_options( $request ) {
		return ac_helper()->user->get_roles();
	}

	/**
	 * @inheritdoc
	 * @see  ACP_Editing_Model::get_view_settings()
	 */
	public function get_view_settings() {
		return array(
			'type'        => 'checklist',
			'placeholder' => __( 'Select roles for access validation', 'ac-addon-members' ),
			'multiple'    => true,
			'options'     => ac_helper()->user->get_roles(),
		);
	}

	/**
	 * @inheritdoc
	 * @see  ACP_Editing_Model::save()
	 */
	public function save( $id, $value ) {

		if ( is_string( $value ) ) {
			$value = explode( ',', $value );
		}

		members_set_post_roles( $id, $value );

		return $value;
	}

}
