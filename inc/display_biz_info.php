<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function get_the_biz_info ( $attr ) {

   $defaults = array (
        'col'    => 1,
        'before' => '',
        'after'  => ''
       );

   $attr = wp_parse_args( $attr, $defaults );

  $col = esc_attr( intval( $attr['col'] ) );
  $layout = '';
  if ($col > 1) {
    $layout = ' is-grid';
  }

$content = '';                                       
$site_adress = get_option( 'woocommerce_store_address' );
$site_adress2 = get_option( 'woocommerce_store_address_2' );
$site_postcode = get_option( 'woocommerce_store_postcode' );
$site_city = get_option( 'woocommerce_store_city' );
$site_country = get_option( 'woocommerce_store_country' );
$site_phone = get_option( 'woocommerce_store_phone' );
$site_phone_call = str_replace(' ', '', $site_phone);
$site_email = get_option( 'woocommerce_store_email' );
$site_vat = get_option( 'biz_vat' );
$site_ean = get_option( 'biz_ean' );

$content .= $attr['before'] . "\n";
$content .= '<!-- address -->';
$content .= '<div class="site-info__address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">';
if ( $site_adress || is_customize_preview() ) :
$content .= '<p class="site-info__address--first" id="postal_address" itemprop="streetAddress">' . esc_html($site_adress) . '</p>';
endif;
if ( $site_adress2 || is_customize_preview() ) :
$content .= '<p class="site-info__address--second" id="postal_address2" itemprop="streetAddress">' . esc_html($site_adress2) . '</p>';
endif;
if ( $site_postcode || $site_city || is_customize_preview() ) :
$content .= '<p class="site-info__postal">';
if ( $site_postcode || is_customize_preview() ) :
$content .= '<span class="site-info__postal--code" id="postal_code" itemprop="postalCode">' . esc_html($site_postcode) . '</span> ';
endif;
if ( $site_city || is_customize_preview() ) :
$content .= '<span class="site-info__postal--city" id="postal_locality" itemprop="addressLocality">' . esc_html($site_city). '</span>';
endif;
$content .= '</p>';
endif;
if ( $site_country || is_customize_preview() ) :
$content .= '<p class="site-info__country" id="postal_country" itemprop="addressCountry">' . esc_html($site_country) . '</p>';
endif;
$content .= '</div><!--/itemtype=PostalAddress-->';
$content .= '<div class="site-info__contact"><!-- Contact information -->';
if ( $site_email || is_customize_preview() ) :
$content .= '<p class="site-info__email"><a href="mailto:' . esc_html($site_email) . '"><span class="email" itemprop="email">' . esc_html($site_email) . '</a></p>';
endif;
if ( $site_phone || is_customize_preview() ) :
$content .= '<p class="site-info__phone">' . __( 'Phone: ', 'the-biz-info' ) . '<a href="tel:' . esc_html($site_phone_call) . '"><span class="telephone" itemprop="telephone">' . esc_html($site_phone) . '</a></p>';
endif;
$content .= '</div>';
if ( $site_vat || $site_ean || is_customize_preview() ) :
$content .= '<div class="site-info__billing"><!-- Billing information -->';
if ( $site_vat || is_customize_preview() ) :
$content .= '<p class="site-info__vat" id="billing_vatid">' . __( 'VAT-number: ', 'the-biz-info' ) . '<span class="vatID" itemprop="vatID">' . esc_html($site_vat) . '</span></p>';
endif;
if ( $site_ean || is_customize_preview() ) :
$content .= '<p class="site-info__eanid" id="billing-eanid">' . __( 'EAN-number: ', 'the-biz-info' ) . '<span class="eanID">' . esc_html($site_ean) . '</p>';
endif;
$content .= '</div>';
endif;
if ( function_exists( 'the_privacy_policy_link' ) ) :
  get_the_privacy_policy_link( '', '<p><span role="separator" aria-hidden="true"></span></p>' );
endif;
$content .= $attr['after'] . "\n";


$content = apply_filters( 'the_privacy_policy_link', $content );

 if ( $content ) {
        return $before . $content . $after;
 }
}

function the_biz_info( $attr = array() ) {
    echo get_the_biz_info( $attr );
}

function biz_info_shortcode_init(){
	add_shortcode( 'biz_info', 'biz_info_shortcode' );
}
add_action('init', 'biz_info_shortcode_init');

function biz_info_shortcode( $attr = array() ){

  // Allow plugin/theme devs to short-ciruit the default output and roll their own.
  $out = apply_filters( 'biz_info_shortcode', '', $attr );

  if ( $out )
  return $out;

   $defaults = array(
    'col'    => 1,
    'before' => '',
    'after'  => ''
  );

  $attr = shortcode_atts( $defaults, $attr, 'biz_info' );

  return get_the_biz_info( $attr );

}
