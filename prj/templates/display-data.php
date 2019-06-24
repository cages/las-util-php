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
<header class="jumbotron text-center row" style="margin-bottom:2px; background:pale; padding:20px;">
    <?php include('header-for-template.php'); ?>
</header>

<!-- Body Section -->
    <div class="row" style="padding-left: 0px">
        <!-- Left-side column Menu Section -->
        <?php include('nav.php'); ?>

        <!-- Center Column Content Section -->
        <div class="col-sm-8">
            <p>TODO: add feature to display data</p>
        </div>
        
        <!-- Right-side Column Content Section -->
        <aside class="col-sm-2">
            <?php include('info-col.php'); ?>
        </aside>
    </div>
    <footer class="jumbotron text-center row" style="padding-bottom:1px; padding-top:8px;">
        <?php include('footer.php'); ?>
    </footer>
</div>
</body>
</html>

