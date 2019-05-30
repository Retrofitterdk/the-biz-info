<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'customize_register', 'biz_info_register_settings' );

// Add fields site identity section and new footer section in customizer
function biz_info_register_settings( $wp_customize ) {

	// Store Address
	$wp_customize->add_setting(
		'woocommerce_store_address',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'type'              => 'option'

		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'woocommerce_store_address',
			array(
				'label'          => __( 'Address', 'the-biz-info' ),
				'section'        => 'title_tagline',
				'settings'       => 'woocommerce_store_address',
				'priority'       => 71
			)
		)
	);

	$wp_customize->add_setting(
		'woocommerce_store_address_2',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'type'              => 'option'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'woocommerce_store_address_2',
			array(
				'label'          => __( 'Address2', 'the-biz-info' ),
				'section'        => 'title_tagline',
				'settings'       => 'woocommerce_store_address_2',
				'priority'       => 72
			)
		)
	);

	// Store Zip Code
	$wp_customize->add_setting(
		'woocommerce_store_postcode',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'type'              => 'option'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'woocommerce_store_postcode',
			array(
				'label'          => __( 'Zip', 'the-biz-info' ),
				'section'        => 'title_tagline',
				'settings'       => 'woocommerce_store_postcode',
				'priority'       => 73
			)
		)
	);

	// Store City
	$wp_customize->add_setting(
		'woocommerce_store_city',
		array(
			'default'     => '',
			'sanitize_callback' => 'sanitize_text_field',
			'type'              => 'option'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'woocommerce_store_city',
			array(
				'label'          => __( 'City', 'the-biz-info' ),
				'section'        => 'title_tagline',
				'settings'       => 'woocommerce_store_city',
				'priority'       => 74
			)
		)
	);

	// Store Country
	$wp_customize->add_setting(
		'woocommerce_store_country',
		array(
			'default'     => '',
			'sanitize_callback' => 'sanitize_text_field',
			'type'              => 'option'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'woocommerce_store_country',
			array(
				'label'          => __( 'Country', 'the-biz-info' ),
				'section'        => 'title_tagline',
				'settings'       => 'woocommerce_store_country',
				'priority'       => 75
			)
		)
	);

	// Store Phone
	$wp_customize->add_setting(
		'woocommerce_store_phone',
		array(
			'default'     => '',
			'sanitize_callback' => 'sanitize_text_field',
			'type'              => 'option'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'woocommerce_store_phone',
			array(
				'label'          => __( 'Phone', 'the-biz-info' ),
				'section'        => 'title_tagline',
				'settings'       => 'woocommerce_store_phone',
				'priority'       => 76
			)
		)
	);
	
	// Store Email
	$wp_customize->add_setting(
		'woocommerce_store_email',
		array(
			'default'     => '',
			'sanitize_callback' => 'sanitize_email',
			'type'              => 'option'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'woocommerce_store_email',
			array(
				'label'          => __( 'E-mail', 'the-biz-info' ),
				'section'        => 'title_tagline',
				'settings'       => 'woocommerce_store_email',
				'priority'       => 77
			)
		)
	);
						
	// Store VAT-number
	$wp_customize->add_setting(
		'woocommerce_store_vat',
		array(
			'default'     => '',
			'sanitize_callback' => 'sanitize_text_field',
			'type'              => 'option'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'woocommerce_store_vat',
			array(
				'label'          => __( 'VAT-number', 'the-biz-info' ),
				'section'        => 'title_tagline',
				'settings'       => 'woocommerce_store_vat',
				'priority'       => 78
			)
		)
	);
						
	// Store EAN-number
	$wp_customize->add_setting(
		'woocommerce_store_ean',
		array(
			'default'     => '',
			'sanitize_callback' => 'sanitize_text_field',
			'type'              => 'option'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'woocommerce_store_ean',
			array(
				'label'          => __( 'EAN-number', 'the-biz-info' ),
				'section'        => 'title_tagline',
				'settings'       => 'woocommerce_store_ean',
				'priority'       => 78
			)
		)
	);
}