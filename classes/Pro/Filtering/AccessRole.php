<?php
namespace ACA\Members\Pro\Filtering;
use ACA\Members\Pro\Filtering;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class AccessRole extends Filtering
{
	/**
	 * @inheritdoc
	 * @see  \ACP\Filtering\Model\Meta::get_filtering_data()
	 */
	public function get_filtering_data() {
		$data = parent::get_filtering_data();

		if ( ! empty( $data['options'] ) ) {
			$data['options'] = $this->parse_role_values( $data['options'] );
		}

		return $data;
	}

	/**
	 * @param  array  $values
	 * @return array
	 */
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
