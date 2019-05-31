<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function get_the_biz_info ( $before = '', $after = '' ) {
$content = '';                                       
$site_home = home_url( '/' );
$site_title = get_bloginfo( 'name' );
$site_description = get_bloginfo( 'description', 'display' );
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

$content .= '<!-- the name of the organization -->';
$content .= '<div id="organization_info" class="site-info" itemscope itemtype="http://schema.org/Organization">';
$content .= '<p class="site-title"><a href="' . esc_url($site_home) . '" rel="home"><span itemprop="legalName">' . esc_html($site_title) . '<span></a></p>';
if ( $site_description || is_customize_preview() ) :
$content .= '<p class="site-description" itemprop="description">' . esc_html($site_description) . '</p>';
endif;
$content .= '<!-- address -->';
$content .= '<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">';
if ( $site_adress || is_customize_preview() ) :
$content .= '<p class="site-adress" id="postal_address" itemprop="streetAddress">' . esc_html($site_adress) . '</p>';
endif;
if ( $site_adress2 || is_customize_preview() ) :
$content .= '<p class="site-adress2" id="postal_address2" itemprop="streetAddress">' . esc_html($site_adress2) . '</p>';
endif;
if ( $site_postcode || $site_city || is_customize_preview() ) :
$content .= '<p class="zip-city">';
if ( $site_postcode || is_customize_preview() ) :
$content .= '<span class="site-postcode" id="postal_code" itemprop="postalCode">' . esc_html($site_postcode) . '</span> ';
endif;
if ( $site_city || is_customize_preview() ) :
$content .= '<span class="site-city" id="postal_locality" itemprop="addressLocality">' . esc_html($site_city). '</span>';
endif;
$content .= '</p>';
endif;
if ( $site_country || is_customize_preview() ) :
$content .= '<p class="site-country" id="postal_country" itemprop="addressCountry">' . esc_html($site_country) . '</p>';
endif;
$content .= '</div><!--/itemtype=PostalAddress-->';
$content .= '<div class="contact-info"><!-- Contact information -->';
if ( $site_email || is_customize_preview() ) :
$content .= '<p class="site-email"><a href="mailto:' . esc_html($site_email) . '"><span class="email" itemprop="email">' . esc_html($site_email) . '</a></p>';
endif;
if ( $site_phone || is_customize_preview() ) :
$content .= '<p class="site-phone">' . __( 'Phone: ', 'the-biz-info' ) . '<a href="tel:' . esc_html($site_phone_call) . '"><span class="telephone" itemprop="telephone">' . esc_html($site_phone) . '</a></p>';
endif;
$content .= '</div>';
if ( $site_vat || $site_ean || is_customize_preview() ) :
$content .= '<div class="billing-info"><!-- Billing information -->';
if ( $site_vat || is_customize_preview() ) :
$content .= '<p class="site-vat" id="billing_vatid">' . __( 'VAT-number: ', 'the-biz-info' ) . '<span class="vatID" itemprop="vatID">' . esc_html($site_vat) . '</span></p>';
endif;
if ( $site_ean || is_customize_preview() ) :
$content .= '<p class="site-eanid" id="billing-eanid">' . __( 'EAN-number: ', 'the-biz-info' ) . '<span class="eanID">' . esc_html($site_ean) . '</p>';
endif;
$content .= '</div>';
endif;
if ( function_exists( 'the_privacy_policy_link' ) ) :
  get_the_privacy_policy_link( '', '<p><span role="separator" aria-hidden="true"></span></p>' );
endif;
$content .= '</div><!--/itemtype=Organization-->';

$content = apply_filters( 'the_privacy_policy_link', $content );

 if ( $content ) {
        return $before . $content . $after;
 }
}

function the_biz_info( $before = '', $after = '' ) {
    echo get_the_biz_info( $before, $after );
}