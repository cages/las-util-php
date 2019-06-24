<?php
/**
 * Main index page
 *
 * @category
 * @package   Las-Util-Php
 * @author    DC Slagel <dcs@mailworks.org>
 * @copyright 2019 DC Slagel
 * @license   MIT
 */
?>

<!doctype html>
<html>
<head>
  <title>Las Util</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>

<body>
<div class="container" style="margin-top:30px">
<!-- Header Section -->
    <?php include('header.php'); ?>

<!-- Body Section -->
    <div class="row" style="padding-left: 0px">
        <!-- Left-side column Menu Section -->
        <div class="col-sm-2">
            <?php include('nav.php'); ?>
        </div>

        <!-- Center Column Content Section -->
        <!-- <div class="col-sm-8"> -->
        <div class="col-sm-10">
        </div>
        
        <!-- Right-side Column Content Section -->
        <!--
        <aside class="col-sm-2">
            <?php include('info-col.php'); ?>
        </aside>
        -->
    </div>
<!-- Footer Section -->
    <?php include('footer.php'); ?>
</div>
</body>
</html>

