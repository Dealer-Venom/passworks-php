<?php
require 'config.php';

$campaign_id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];

if (strlen($name) <= 0 || strlen($email) <= 0) {
  // TODO send a message
  header("Location: index.php");
}

$params = array(
  'secondary_fields' => array(
    array(
      'value' => $name,
      'key'   => 'Name', // key matching the campaign field
      'label' => 'Name'
    ),
    array(
      'value' => $email,
      'key'   => 'Email', // key matching the campaign field
      'label' => 'Email'
    )
  )
);

$api->createCoupon($campaign_id, $params);
header("Location: campaign.php?id=$campaign_id");
