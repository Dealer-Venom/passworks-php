<?php
require 'config.php';
$campaign_id = $_GET["id"];
$campaign = $api->getCouponInfo($campaign_id);
$passes = $api->listCouponPasses($campaign_id);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Testing Creation Passes</title>
  <link rel="stylesheet" href="">
  <style>

    form label {
      display: block;
    }

  </style>
</head>
<body>

<h2>Create your pass for the campaign "<?= $campaign->name ?>"</h2>
<form action="generate_pass.php" method="post">
  <input type="hidden" name="id" value="<?= $campaign_id ?>">
  <label for="">
    Name
    <input type="text" name="name" placeholder="Whats is your name">
  </label>
  <label for="">
    Email
    <input type="email" name="email" placeholder="What is your email?">
  </label>
  <input type="submit" value="Generate">
</form>

<?php if (sizeof($passes) > 0) { ?>
<section>
  <h2>Existing passes</h2>
  <table>
    <thead>
      <tr>
        <th>Pass ID</th>
        <th>Created</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
  <?php foreach ($passes as $key => $value) { ?>
      <tr>
        <td><?= $value->id ?></td>
        <td><?= $value->created_at ?></td>
        <td>
          <a href="<?= $value->page_url ?>" title="">Page</a>
          <a href="<?= $value->pkpass_url ?>" title="">Download</a>
          <a href="<?= $value->page_url ?>.qrcode" title="">QR Code</a>
        </td>
      </tr>
  <?php }  ?>
    </tbody>
  </table>
</section>
<?php } ?>

</body>
</html>
