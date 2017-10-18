<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACA_Members_Pro_Filtering_AccessRole extends ACA_Members_Pro_Filtering {

	public function get_filtering_data() {
		$data = parent::get_filtering_data();

		if ( ! empty( $data['options'] ) ) {
			$data['options'] = $this->parse_role_values( $data['options'] );
		}

		return $data;
	}

	public function parse_role_values( $values ) {

		$role_names = ac_helper()->user->get_roles();

		foreach ( $values as $key => $val ) {
			if ( ! empty( $role_names[ $val ] ) ) {
				$values[ $key ] = $role_names[ $val ];
			}
			elseif ( ! empty( $role_names[ $key ] ) ) {
				$values[ $key ] = $role_names[ $key ];
			}
		}

		return $values;
	}

}
