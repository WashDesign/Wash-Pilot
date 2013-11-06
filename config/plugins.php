<?php

/**
  * Title: Plugins
  * Description: For implementation, control and administration of core plugins
  * Author: Wash
  * Date: October 2013
  * Package: FlightDeck
  **/

/** 5.  Plugins
  *
  * 5.1 ACF
  *
  **/


  // ===========
  // = 5.1 ACF =
  // ===========

/**
  * ACF Options Pages
  *
  * @author lewis
  *
  */

function wash_acf_options_page_settings( $settings )
{

	$settings['pages'] = array('Company Information', 'Site Wide');

	return $settings;

}
//add_filter('acf/options_page/settings', 'wash_acf_options_page_settings');



/**
  * Register field groups
  *
  * The register_field_group function accepts 1 array which holds the relevant data to register a field group
  *
  * @author ACF
  *
  */

if( function_exists( "register_field_group" ) ) {

	register_field_group(array (
		'id' => '526fbad47e183',
		'title' => 'Company Information',
		'fields' =>
		array (
			0 =>
			array (
				'key' => 'field_28',
				'label' => 'Company Name',
				'name' => 'company_name',
				'type' => 'text',
				'order_no' => 0,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' =>
				array (
					'status' => 0,
					'rules' =>
					array (
						0 =>
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'html',
			),
			1 =>
			array (
				'key' => 'field_49',
				'label' => 'Building Name',
				'name' => 'building_name',
				'type' => 'text',
				'order_no' => 1,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' =>
				array (
					'status' => 0,
					'rules' =>
					array (
						0 =>
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'html',
			),
			2 =>
			array (
				'key' => 'field_29',
				'label' => 'Street Name',
				'name' => 'street_name',
				'type' => 'text',
				'order_no' => 2,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' =>
				array (
					'status' => 0,
					'rules' =>
					array (
						0 =>
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'html',
			),
			3 =>
			array (
				'key' => 'field_30',
				'label' => 'Town',
				'name' => 'town',
				'type' => 'text',
				'order_no' => 3,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' =>
				array (
					'status' => 0,
					'rules' =>
					array (
						0 =>
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'html',
			),
			4 =>
			array (
				'key' => 'field_31',
				'label' => 'City',
				'name' => 'city',
				'type' => 'text',
				'order_no' => 4,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' =>
				array (
					'status' => 0,
					'rules' =>
					array (
						0 =>
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'html',
			),
			5 =>
			array (
				'key' => 'field_32',
				'label' => 'Region',
				'name' => 'region',
				'type' => 'text',
				'order_no' => 5,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' =>
				array (
					'status' => 0,
					'rules' =>
					array (
						0 =>
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'html',
			),
			6 =>
			array (
				'key' => 'field_33',
				'label' => 'Postal Code',
				'name' => 'postal_code',
				'type' => 'text',
				'order_no' => 6,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' =>
				array (
					'status' => 0,
					'rules' =>
					array (
						0 =>
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'html',
			),
			7 =>
			array (
				'key' => 'field_34',
				'label' => 'Telephone Number',
				'name' => 'telephone_number',
				'type' => 'text',
				'order_no' => 7,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' =>
				array (
					'status' => 0,
					'rules' =>
					array (
						0 =>
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'html',
			),
			8 =>
			array (
				'key' => 'field_35',
				'label' => 'Fax Number',
				'name' => 'fax_number',
				'type' => 'text',
				'order_no' => 8,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' =>
				array (
					'status' => 0,
					'rules' =>
					array (
						0 =>
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'html',
			),
			9 =>
			array (
				'key' => 'field_36',
				'label' => 'General Email',
				'name' => 'general_email',
				'type' => 'text',
				'order_no' => 9,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' =>
				array (
					'status' => 0,
					'rules' =>
					array (
						0 =>
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'html',
			),
			10 =>
			array (
				'key' => 'field_37',
				'label' => 'Contact Form Recipient Email',
				'name' => 'contact_form_recipient_email',
				'type' => 'text',
				'order_no' => 10,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' =>
				array (
					'status' => 0,
					'rules' =>
					array (
						0 =>
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'html',
			),
			11 =>
			array (
				'key' => 'field_40',
				'label' => 'Google Directions Link',
				'name' => 'google_directions_link',
				'type' => 'text',
				'order_no' => 11,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' =>
				array (
					'status' => 0,
					'rules' =>
					array (
						0 =>
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-company-information',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}