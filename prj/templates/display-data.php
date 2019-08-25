<?php
/**
 * Display Las Data
 *
 * @category
 * @package   Las-Util-Php
 * @author    DC Slagel <dcs@mailworks.org>
 * @copyright 2019 DC Slagel
 * @license   MIT
 */
require('las_get_data.php');
?>

<!doctype html>
<html>
<head>
  <title>Las Util</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="stylesheets/style.css">
</head>

<body>
<div class="container">
<!-- Header Section -->
    <?php include('header.php'); ?>

<!-- Body Section -->
    <div class="row">
        <!-- Left-side column Menu Section -->
        <div>
            <?php include('nav.php'); ?>
        </div>

        <!-- Center Column Content Section -->
        <!-- <div class="col-sm-8"> -->
        <div >
            <h3>Initial Las Header Table</h3>
            <?php las_get_data() ?>
        </div>
    </div>
<!-- Footer Section -->
    <?php include('footer.php'); ?>
</div>
</body>
</html>

