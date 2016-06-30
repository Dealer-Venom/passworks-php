<?php
require 'config.php';
$campaign_id = $_GET["id"];
$campaign = $api->getCouponInfo($campaign_id);
$passes = $api->listCouponPasses($campaign_id);

// Getting a daily report
// $report_params = array("start_date" => '2010-10-10', "end_date" => '2016-06-30');
// $daily_report = $api->getCouponDailyReport($campaign_id, $report_params);

$total_report = $api->getCouponTotalReport($campaign_id);

$report_data = get_object_vars($total_report->report);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Testing Creation Passes</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
  <input type="submit"  value="Generate" class="btn btn-primary" />
</form>

<?php if (sizeof($passes) > 0) { ?>
<div class="row">
  <div class="col-md-6">
    <section>
    <h2>Existing passes</h2>
    <table class="table">
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
  </div>
</div>
<?php } ?>

<?php if (sizeof($report_data) > 0) { ?>
  <div class="row">
    <div class="col-md-4">

      <h2>Reports</h2>
      <table class="table">
        <thead>
          <tr>
            <th>Key</th>
            <th>Value</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($report_data as $key => $value) { ?>
            <tr>
              <td><?= $key ?></td>
              <td><?= $value ?></td>
            </tr>
        <?php } ?>
        </tbody>
      </table>

      </div>
    </div>
<?php } ?>
</body>
</html>
