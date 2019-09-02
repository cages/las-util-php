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
  <title>Las-Util</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- CSS File -->
  <link rel="stylesheet" href="stylesheets/style.css">
</head>
<body>
<div class="page">
    <?php include('header.php'); ?>
    <?php include('nav.php'); ?>
    <h2>LAS-Util Detail Display</h2>
    <?php las_get_data() ?>
</div>
<?php include('footer.php'); ?>
</body>
</html>

