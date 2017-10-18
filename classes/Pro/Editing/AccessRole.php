<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Members_Pro_Editing_AccessRole extends ACP_Editing_Model {

	public function get_edit_value( $id ) {
		return implode( ',', (array) members_get_post_roles( $id ) );
	}

	/**
	 * Get editing options when using an ajax callback
	 *
	 * @param array $request
	 *
	 * @return array
	 */
	public function get_ajax_options( $request ) {
		return array_map( 'translate_user_role', wp_roles()->get_names() );
	}

	public function get_view_settings() {
		return array(
			'type'        => 'select2_dropdown',
			'placeholder' => __( 'Select roles for access validation', 'codepress-admin-columns' ),
			'multiple'    => true,
			'options'     => $this->get_ajax_options( null ),
		);
	}

	public function save( $id, $value ) {

		if ( is_string( $value ) ) {
			$value = explode( ',', $value );
		}

		members_set_post_roles( $id, $value );

		return $value;
	}

}
