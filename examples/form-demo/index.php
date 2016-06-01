<?php
require 'config.php';

$campaigns = $api->getCouponCampaigns();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Testing Creation Passes</title>
  <link rel="stylesheet" href="">
</head>
<body>

<section>
  <h2>Campaigns</h2>
  <table>
    <thead>
      <tr>
        <th>Campaign</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
  <?php foreach ($campaigns as $key => $value) { ?>
      <tr>
        <td>
          <img src="<?= $value->distributions[0]->preview_url ?>" alt="">
          <a href="campaign.php?id=<?= $value->id ?>" title=""><?= $value->name ?></a>
        </td>
        <td>
          <a href="<?= $value->distributions[0]->page_url ?>" title="">Page</a>
          <a href="<?= $value->distributions[0]->pkpass_url ?>" title="">Download</a>
          <a href="<?= $value->distributions[0]->page_url ?>.qrcode" title="">QR Code</a>
        </td>
      </tr>
  <?php }  ?>
    </tbody>
  </table>
</section>

</body>
</html>
