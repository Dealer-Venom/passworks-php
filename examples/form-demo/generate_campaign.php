<?php
require 'config.php';

// upload a asset (background image)
$icon = $api->createAsset('icon', 'assets/climb-gym.png');

// As any other object in the API it returns a stdClass with the object's properties
// print_r($icon);
// stdClass Object
// (
//     [id] => d5a32073-2ded-481b-838f-58d29f9e11ca
//     [asset_type] => icon
//     [created_at] => 2016-05-31T15:18:21Z
// )

$coupon_campaign_args = array(
 'name'    => "50% Off for Climbers",
 'icon_id' => $icon->id,
 'secondary_fields' => array(
    array(
      'key' => "Name", // This key is going to be used when matching the pass information
      'value' => "Your Name",
      'label' => "Name"
    ),
    array(
      'key' => "Email", // This key is going to be used when matching the pass information
      'value' => "Your email",
      'label' => "Email"
    )
  ),
 'back_fields' => array(
    array(
      'key' => "contact",
      'value' => "Call us anytime: +351 915 652 071",
      'label' => "Our contact"
    )
  ),
 'barcode' => array(
    'format' => "qrcode",
    'message' => "",
    'alt_text' => "",
    'alt_text_type' => "mirror"
  )
);

$coupon_campaign = $api->createCouponCampaign($coupon_campaign_args);

// print_r($coupon_campaign);
//
// stdClass Object (
//   [id] => 9f28f63e-823b-43b0-8c53-30c7ed596ff5
//   [name] => 20% Off for Climbers
//   [template_id] => 62a4341e-4499-4b27-b6bc-32a9ee42af94
//   [organization_name] => asd
//   [barcode] => stdClass Object (
//     [format] => none
//     [message] =>
//     [alt_text] =>
//     [alt_text_type] => mirror
//   )
//   [barcodes] => Array()
//   [allow_multiple_redeems] =>
//   [header_fields] => Array()
//   [primary_fields] => Array()
//   [secondary_fields] => Array()
//   [auxiliary_fields] => Array()
//   [back_fields] => Array()
//   [locations] => Array()
//   [beacons] => Array()
//   [created_at] => 2016-05-31T15:19:56Z
//   [updated_at] => 2016-05-31T15:19:56Z
//   [distributions] => Array (
//     [0] => stdClass Object (
//       [id] => 98497cb0-e798-4b02-a0d5-c04034c9ce05
//       [distribution_type] => downloadPage
//       [state] => published
//       [page_url] => http://192.168.1.79.xip.io:3000/p/s8K7vPi9vQ
//       [pkpass_url] => http://192.168.1.79.xip.io:3000/p/s8K7vPi9vQ.pkpass
//       [preview_url] => http://192.168.1.79.xip.io:3000/p/s8K7vPi9vQ.png
//       [created_at] => 2016-05-31T15:19:56.696Z
//       [updated_at] => 2016-05-31T15:19:56.769Z
//       [published_at] => 2016-05-31T15:19:56.776Z
//     )
//   )
// )
